<template>
  <div class="container">
    <div class="menu-bar-container back-div">
      <!-- this containes both image profile and menu bar -->
      <MenuBar :isEdit="true" />
    </div>
    <div class="image-edit-container">
      <h1>تحديث صورة الملف الشخصي</h1>
      <div class="colored-line"></div>

      <input
        @change="onImageChange"
        type="file"
        id="fileElem"
        multiple
        accept="image/*"
        class="visually-hidden"
      />
      <label class="upload-image" for="fileElem"
        ><span>حمل الصورة</span> <span>+</span></label
      >
    </div>
    <div class="notifications-container back-div">
      <ul dir="rtl">
        <li
          class="notification-item back-div"
          v-for="item in notificationsList"
          :key="item"
        >
          {{ item }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import MenuBar from "@/components/UserProfile/MenuBar";

export default {
  components: {
    MenuBar
  },
  data: function() {
    return {
      selectedImage: null,
      userName: "محمــد عبــداللـه",
      notificationsList: [
        `لأن الحياة أحلى مع ابتسامة طفلك، عيادة الأسنان بمركز أندلسية لصحة الطفل
 تقدم تجربة ترفيهية وممتعة، حتى لا يشعر طفلك بأي خوف أو توتر، ويتميز 
طاقمنا الطبي بالتعامل المرن والمرح مع الأطفال`,
        `لأن الحياة أحلى مع ابتسامة طفلك، عيادة الأسنان بمركز أندلسية لصحة الطفل
 تقدم تجربة ترفيهية وممتعة، حتى لا يشعر طفلك بأي خوف أو توتر، ويتميز 
طاقمنا الطبي بالتعامل المرن والمرح مع الأطفال`,
        `لأن الحياة أحلى مع ابتسامة طفلك، عيادة الأسنان بمركز أندلسية لصحة الطفل
 تقدم تجربة ترفيهية وممتعة، حتى لا يشعر طفلك بأي خوف أو توتر، ويتميز 
طاقمنا الطبي بالتعامل المرن والمرح مع الأطفال`,
        `لأن الحياة أحلى مع ابتسامة طفلك، عيادة الأسنان بمركز أندلسية لصحة الطفل
 تقدم تجربة ترفيهية وممتعة، حتى لا يشعر طفلك بأي خوف أو توتر، ويتميز 
طاقمنا الطبي بالتعامل المرن والمرح مع الأطفال`,
        `لأن الحياة أحلى مع ابتسامة طفلك، عيادة الأسنان بمركز أندلسية لصحة الطفل
 تقدم تجربة ترفيهية وممتعة، حتى لا يشعر طفلك بأي خوف أو توتر، ويتميز 
طاقمنا الطبي بالتعامل المرن والمرح مع الأطفال`,
        `لأن الحياة أحلى مع ابتسامة طفلك، عيادة الأسنان بمركز أندلسية لصحة الطفل
 تقدم تجربة ترفيهية وممتعة، حتى لا يشعر طفلك بأي خوف أو توتر، ويتميز 
طاقمنا الطبي بالتعامل المرن والمرح مع الأطفال`
      ]
    };
  },
  methods: {
    onImageChange: function() {
      const uploadedImage = event.target.files[0];
      const reader = new FileReader();
      reader.readAsDataURL(uploadedImage);
      reader.onload = event => {
        this.selectedImage = event.target.result;
        window.console.log(this.selectedImage);
      };
    },
    onImageUpload: function() {
      window.console.log("selected file is " + this.selectedImage);
      // upload file, get it from this.selectedFile
    }
  }
};
</script>

<style scoped>
/* Docs: https://developer.mozilla.org/en-US/docs/Web/API/File/Using_files_from_web_applications */
.visually-hidden {
  position: absolute !important;
  height: 1px;
  width: 1px;
  overflow: hidden;
  clip: rect(1px, 1px, 1px, 1px);
}

/* Separate rule for compatibility, :focus-within is required on modern Firefox and Chrome */
input.visually-hidden:focus + label {
  outline: thin dotted;
}

input.visually-hidden:focus-within + label {
  outline: thin dotted;
}
.back-div {
  opacity: 0.6;
}
.menu-bar-container {
  margin: 20px auto 20px auto;
  padding: 20px;
  text-align: center;
  position: relative;
}

.menu-bar-container > h1 {
  color: #1d4590;
  padding: 60px;
}
.image-edit-container {
  border: 2px solid #ffc77a;
  border-radius: 50px;
  color: #1d4590;
  padding: 100px;
  text-align: center;
  background: white;
  position: absolute;
  z-index: 999;
  top: 400px;
  left: 25%;
}
.image-edit-container > div.colored-line {
  border: 2px solid #ffc77a;
  margin: 40px auto;
  width: 100%;
}
.upload-image {
  border: 2px solid #ffc77a;
  border-radius: 50px;
  background: white;
  color: #003580;
  display: block;
  margin: 10px auto;
  padding: 17px;
  width: 100%;
  transition-timing-function: ease-out;
  font-size: 2rem;
}
.upload-image:hover {
  background-color: #ffc77a;
  color: white;
  cursor: pointer;
}
.notifications-container {
  margin: 400px auto 200px auto;
  text-align: right;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-self: center;
  color: #1d4590;
}
.notifications-container > ul {
  list-style: none;
  font-size: 1.5rem;
  text-align: right;
  margin: 20px 90px 20px -50px;
}
ul > li.notification-item {
  border: 2px solid #ffc77a;
  border-radius: 2rem;
  margin: 30px;
  width: 75%;
  padding: 20px;
}
</style>
