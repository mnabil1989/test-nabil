<template>
  <div dir="ltr">
    <client-only>
      <beautiful-chat
        :participants="participants"
        :titleImageUrl="titleImageUrl"
        :onMessageWasSent="onMessageWasSent"
        :messageList="messageList"
        :newMessagesCount="newMessagesCount"
        :isOpen="isChatOpen"
        :close="closeChat"
        :icons="icons"
        :open="openChat"
        :showEmoji="false"
        :showFile="true"
        :showTypingIndicator="showTypingIndicator"
        :colors="colors"
        :alwaysScrollToBottom="alwaysScrollToBottom"
        :messageStyling="messageStyling"
        @scrollToTop="handleScrollToTop"
        @onType="handleOnType"
        @edit="editMessage"
      >
        <template v-slot:header></template>
      </beautiful-chat>
    </client-only>
  </div>
</template>
<script>
import CloseIcon from "vue-beautiful-chat/src/assets/close-icon.png";
import OpenIcon from "vue-beautiful-chat/src/assets/logo-no-bg.svg";
import FileIcon from "vue-beautiful-chat/src/assets/file.svg";
import CloseIconSvg from "vue-beautiful-chat/src/assets/close.svg";

export default {
  name: "app",
  props: ["appointmentID", "converstaionId", "doctorId"],
  async mounted() {
    let getNameflag = false;
    this.getMessages(getNameflag);
    // setInterval(() => {}, 500);
  },
  data() {
    return {
      curPage: 10,
      icons: {
        open: {
          img: OpenIcon,
          name: "default"
        },
        close: {
          img: CloseIcon,
          name: "default"
        },
        file: {
          img: FileIcon,
          name: "default"
        },
        closeSvg: {
          img: CloseIconSvg,
          name: "default"
        }
      },
      participants: [], // the list of all the participant of the conversation. `name` is the user name, `id` is used to establish the author of a message, `imageUrl` is supposed to be the user avatar.
      titleImageUrl:
        "https://a.slack-edge.com/66f9/img/avatars-teams/ava_0001-34.png",
      messageList: [], // the list of the messages to show, can be paginated and adjusted dynamically
      newMessagesCount: 0,
      isChatOpen: true, // to determine whether the chat window should be open or closed
      showTypingIndicator: "", // when set to a value matching the participant.id it shows the typing indicator for the specific user
      colors: {
        header: {
          bg: "#4e8cff",
          text: "#ffffff"
        },
        launcher: {
          bg: "#4e8cff"
        },
        messageList: {
          bg: "#ffffff"
        },
        sentMessage: {
          bg: "#4e8cff",
          text: "#ffffff"
        },
        receivedMessage: {
          bg: "#eaeaea",
          text: "#222222"
        },
        userInput: {
          bg: "#f4f7f9",
          text: "#565867"
        }
      }, // specifies the color scheme for the component
      alwaysScrollToBottom: false, // when set to true always scrolls the chat to the bottom when new events are in (new message, user starts typing...)
      messageStyling: true // enables *bold* /emph/ _underline_ and such (more info at github.com/mattezza/msgdown)
    };
  },
  methods: {
    getMessages(getNameflag) {
      this.$axios
        .post(
          `/${this.$route.params.bu}-api/get_conversation`,
          {
            conversation_id: this.converstaionId,
            offset: 0,
            take: this.curPage
          },
          {
            progress: false,
            header: {
              Authorization: this.$auth.getToken(
                `${this.$route.params.bu}Local`
              )
            }
          }
        )
        .then(res => {
          this.$nextTick(() => {
            if (!getNameflag) {
              let participantObj =
                this.$auth.user.roule != "doctor"
                  ? {
                      id: res.data.userone.id,
                      name: res.data.userone.name,
                      imageUrl: res.data.userone.avatar
                    }
                  : {
                      id: res.data.usertwo.id,
                      name: res.data.usertwo.name,
                      imageUrl: res.data.usertwo.avatar
                    };
              this.participants = [participantObj];
              getNameflag = true;
            }
            this.messageList = res.data.messages
              .map(item => {
                if (item.is_seen == 0 && item.user_id != this.$auth.user.id) {
                  this.$axios.post(`/${this.$route.params.bu}-api/makeseen`, {
                    message_id: item.id
                  });
                }
                return {
                  type: "text",
                  author:
                    this.$auth.user.id == item.sender.id
                      ? "me"
                      : item.sender.id,

                  data: {
                    text: item.message,
                    meta: item.is_seen != 0 ? "Seen" : ""
                  },
                  delivered: true
                };
              })
              .reverse();
          });
        })
        .then(res => {
          setTimeout(() => {
            this.$nextTick(() => {
              this.getMessages(getNameflag);
            });
          }, 500);
        })
        .catch(err => {
          setTimeout(() => {
            this.$nextTick(() => {
              this.getMessages(getNameflag);
            });
          });
        });
    },
    sendMessage(text) {
      if (text.length > 0) {
        this.newMessagesCount = this.isChatOpen
          ? this.newMessagesCount
          : this.newMessagesCount + 1;
        this.onMessageWasSent({
          author: "support",
          type: "text",
          data: { text }
        });
      }
    },
    async onMessageWasSent(message) {
      // called when the user sends a message
      if (message.data.text)
        await this.$axios.post(
          `/${this.$route.params.bu}-api/send_message`,
          {
            conversation_id: this.converstaionId,
            message: message.data.text
          },
          {
            header: {
              Authorization: this.$auth.getToken(
                `${this.$route.params.bu}Local`
              )
            }
          }
        );
      console.log(message.data.file);
      console.log(message);
      let form = new FormData();
      form.append('appointment_id',this.appointmentID);
      form.append("attachment", message.data.file);
      if (message.data.file)
        await this.$axios.post(
          `/${this.$route.params.bu}-api/appointments/${this.appointmentID}/attachments`,

          form,
          {
            header: {
              Authorization: this.$auth.getToken(
                `${this.$route.params.bu}Local`
              )
            }
          }
        );
      this.messageList = [...this.messageList, message];
    },
    openChat() {
      // called when the user clicks on the fab button to open the chat
      this.isChatOpen = true;
      this.newMessagesCount = 0;
    },
    closeChat() {
      // called when the user clicks on the botton to close the chat
      this.isChatOpen = false;
    },
    handleScrollToTop() {
      this.curPage += 10;
      console.log(this.curPage);
      // called when the user scrolls message list to top
      // leverage pagination for loading another page of messages
    },
    handleOnType() {
      console.log("Emit typing event");
    },
    editMessage(message) {
      const m = this.messageList.find(m => m.id === message.id);
      m.isEdited = true;
      m.data.text = message.data.text;
    }
  }
};
</script>
<style  >
.sc-chat-window {
  position: static !important;
  width: 100% !important;
  min-height: 360px;
}
.sc-launcher {
  display: none !important;
}
.sc-header {
  display: none !important;
}
.sc-header {
  font-size: 1.6rem;
  text-align: center !important;
}
</style>
