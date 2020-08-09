<template>
    <div class="container">
         <div class="img-container"></div>
         <div class="text-container">
             <p>نسخة الهاتف المحمول</p>
             <div class="colored-line">
             </div>
         </div>
    </div>
        
    
</template>

<style scoped>
    .container{
        height: 100%;
    }
    .img-container{
        display:flex;
        flex-direction: column;
        justify-content: space-between;
        color:white;
        height: 80%;
        background-image: url(http://www.believernomics.com/communities/4/004/012/957/734/images/4635192735.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position:center;  
    }

    .text-container{
        text-align: center;
        color: white;
    }
.colored-line{
        background-color: #ffc77a;
        height:2px;
        width: 30%;
        margin:2px auto;
    }
</style>