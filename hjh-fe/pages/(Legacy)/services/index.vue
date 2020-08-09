<template>
    <div class="container">
        <div class="menu-bar-container">
            <h1> 1خدماتنا</h1>
            <MenuBar />
        </div> 
        <div class="service-list-container">
           
            <ul>
                <ServiceListItem v-for="listItem in serviceList" :key="listItem.id" 
                    :title="listItem.title"
                    :content="listItem.content"
                />
            </ul>
        </div>
    </div>
    

</template>

<script>
import ServiceListItem from '@/components/Services/ServiceListItem'
import MenuBar from '@/components/Services/MenuBar'

export default {
    components: {
        ServiceListItem,
        MenuBar
    },
    data: function(){
        return {
            serviceList:[
                {id:0,
                 title: 'وحدة قسطرة القلب', 
                 content:`حرصاً من مستشفى حي الجامعة على تقديم أفضل الرعاية الطبية الدقيقة للمرضى، تشمل
رعايتنا توفير وحدة خاصة بقسطرة القلب تم تأسيسها من أجل تقديم العناية والاهتمام
المطلوبين للحالات التي تحتاج إلى قسطرة القلب، وذلك من خلال توفير عدد كافي من 
الأسرة بالمستشفى بالإضافة إلى أحدث وأدق الأجهزة والتقنيات اللازمة لرعاية
المريض ومتابعته أثناء وبعد إجراء القسطرة`
                },
                {id:1,
                 title: 'وحدة قسطرة القلب', 
                 content:`حرصاً من مستشفى حي الجامعة على تقديم أفضل الرعاية الطبية الدقيقة للمرضى، تشمل
رعايتنا توفير وحدة خاصة بقسطرة القلب تم تأسيسها من أجل تقديم العناية والاهتمام
المطلوبين للحالات التي تحتاج إلى قسطرة القلب، وذلك من خلال توفير عدد كافي من 
الأسرة بالمستشفى بالإضافة إلى أحدث وأدق الأجهزة والتقنيات اللازمة لرعاية
المريض ومتابعته أثناء وبعد إجراء القسطرة`
                },
                {id:2,
                 title: 'وحدة قسطرة القلب', 
                 content:`حرصاً من مستشفى حي الجامعة على تقديم أفضل الرعاية الطبية الدقيقة للمرضى، تشمل
رعايتنا توفير وحدة خاصة بقسطرة القلب تم تأسيسها من أجل تقديم العناية والاهتمام
المطلوبين للحالات التي تحتاج إلى قسطرة القلب، وذلك من خلال توفير عدد كافي من 
الأسرة بالمستشفى بالإضافة إلى أحدث وأدق الأجهزة والتقنيات اللازمة لرعاية
المريض ومتابعته أثناء وبعد إجراء القسطرة`
                },
            ]
        }
    }
}
</script>

<style>
    .menu-bar-container {
        margin: 20px auto 20px auto;
        padding: 20px;
        text-align: center;
        position: relative;
       
    }
    .menu-bar-container > h1{
        font-size: 3.5rem;
        color: #1d4590;
        margin: 0 auto 4% auto;
        padding-bottom: 20px;
        display: inline-block;
    }
</style>