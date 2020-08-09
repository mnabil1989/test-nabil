<template>
    <div class="register-container">
        <form @submit.prevent="handleSubmit">
            <Input label="الاميل الخاص بك" type="email" v-model="userEmail" required="true"/>
            <Input label="كلمة السر" type="password" v-model="userPassword" required="true"/>
            <Input label="رقم الهاتف" type="password" v-model="userConfirmedPassword" required="true"/>
            <button type="submit"> تأكيد </button>
        </form>
    </div>
</template>

<script>
import Input from '@/components/Common/Input'
import IconBar from '@/components/Common/IconBar'
export default {
    components:{Input, IconBar},
    data(){
        return {
            userEmail:'',
            userPassword:'',
            userConfirmedPassword:'',
            newUser:{},
        }
    },
    methods:{
        handleSubmit(){
            //Here We can handle the registeration process
            if(this.userPassword !== this.userConfirmedPassword){
                alert('your password didn\'t match');
                this.userPassword='';
                this.userConfirmedPassword='';
                return;
            }
                try {
                    //here we add auth functionality
                    this.newUser = {
                        email:this.userEmail,
                        password: this.userPassword,
                    }
                    window.console.log("success registered email: "+ this.newUser.email)
                    this.userEmail='';
                    this.userPassword='';
                    this.userConfirmedPassword=''
                } catch (error) {
                    window.console.log(error)
                }
        }
    }
}
</script>

<style scoped>
.register-container{
    display: flex;
    flex-direction: column;
}
.lower-section{
    display:flex;
    flex-direction: column;
    justify-content: start;
    align-items: center;
}
.icon-container{
    margin:auto 0 auto 40px;
}
form > button{
    border:2px solid #ffc77a;
    border-radius:5px;
    background: white;
    color:#003580;
    display: block;
    margin: 10px auto;
    padding:5px 30px;
    transition-timing-function: ease-out;
}
form > button:hover{
    background-color: #ffc77a;
    color: white;
}
.signin-option> span {
    color: #003580;
}
.signin-option > span > a{
    cursor: pointer;
}
</style>