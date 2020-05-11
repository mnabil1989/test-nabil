<?php

use App\Clinic;
use App\Doctor;
use App\Service;
use App\Slider;
use App\Tag;
use App\Post;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Permission;

class PagesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('slug', 'pages');
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'pages',
                'display_name_singular' => __('voyager::seeders.data_types.page.singular'),
                'display_name_plural' => __('voyager::seeders.data_types.page.plural'),
                'icon' => 'voyager-file-text',
                'model_name' => 'TCG\\Voyager\\Models\\Page',
                'controller' => '',
                'generate_permissions' => 1,
                'description' => '',
            ])->save();
        }

        //Data Rows
        $pageDataType = DataType::where('slug', 'pages')->firstOrFail();
        $dataRow = $this->dataRow($pageDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'order' => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'author_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('voyager::seeders.data_rows.author'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'order' => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'title');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('voyager::seeders.data_rows.title'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'order' => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'excerpt');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text_area',
                'display_name' => __('voyager::seeders.data_rows.excerpt'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'order' => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'body');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'rich_text_box',
                'display_name' => __('voyager::seeders.data_rows.body'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'order' => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'slug');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('voyager::seeders.data_rows.slug'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'slugify' => [
                        'origin' => 'title',
                    ],
                    'validation' => [
                        'rule' => 'unique:pages,slug',
                    ],
                ],
                'order' => 6,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'meta_description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('voyager::seeders.data_rows.meta_description'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'order' => 7,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'meta_keywords');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'text',
                'display_name' => __('voyager::seeders.data_rows.meta_keywords'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'order' => 8,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'status');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'select_dropdown',
                'display_name' => __('voyager::seeders.data_rows.status'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'default' => 'INACTIVE',
                    'options' => [
                        'INACTIVE' => 'INACTIVE',
                        'ACTIVE' => 'ACTIVE',
                    ],
                ],
                'order' => 9,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'order' => 10,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'order' => 11,
            ])->save();
        }

        $dataRow = $this->dataRow($pageDataType, 'image');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type' => 'image',
                'display_name' => __('voyager::seeders.data_rows.page_image'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'order' => 12,
            ])->save();
        }

        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __('voyager::seeders.menu_items.pages'),
            'url' => '',
            'route' => 'voyager.pages.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-file-text',
                'color' => null,
                'parent_id' => null,
                'order' => 7,
            ])->save();
        }

        //Permissions
        Permission::generateFor('pages');
        //Content
        $page = Page::firstOrNew([
            'slug' => 'hello-world',
        ]);
        if (!$page->exists) {
            $page->fill([
                'author_id' => 0,
                'title' => 'Hello World',
                'excerpt' => 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.',
                'body' => '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>
<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>',
                'image' => 'pages/page1.jpg',
                'meta_description' => 'Yar Meta Description',
                'meta_keywords' => 'Keyword1, Keyword2',
                'status' => 'ACTIVE',
            ])->save();
        }
        Clinic::create([
            'id' => 1,
            'name_ar' => 'عيادة أمراض القلب',
            'name_en' => 'Cardiac Diseases Clinic',
            'small_description' => 'تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج، حيث ساعدت عيادة أمراض القلب في علاج ما يزيد على 2000 مريض، وأعادت لهم الأمل في حياة سعيدة وآمنة من جديد.',
            'description' => '<p>تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج، حيث ساعدت عيادة أمراض القلب في علاج ما يزيد على 2000 مريض، وأعادت لهم الأمل في حياة سعيدة وآمنة من جديد.</p>
<p>وتتميز العيادة بخدمات استثنائية تساعد على أن تكون رحلة العلاج رحلة آمنة وبأقصى درجات الرعاية للمرضى، مثل:-</p>
<p>&nbsp;</p>
<ul>
<li>خدمة طوارئ القلب متوفرة 24 ساعة يومياً طوال أيام الأسبوع.</li>
<li>وجود استشاري قلب عند الطلب 24 ساعة يومياً طوال أيام الأسبوع.</li>
<li>وحدة رعاية القلب تعمل على مدار 24 ساعة يومياً.</li>
</ul>
<p>&nbsp;</p>
<h2 style="text-align: right;">الخدمات التي تقدمها عيادة أمراض القلب:-</h2>
<ul>
<li>إجراء قسطرة القلب التشخيصية والعلاجية.</li>
<li>علاج أمراض القلب الروماتيزمية والوراثية.</li>
<li>فشل وتضخم عضلة القلب.</li>
<li>تركيب صمامات ودعامات القلب.</li>
<li>علاج عدم انتظام ضربات القلب.</li>
<li>علاج أمراض الشرايين التاجية.</li>
<li>الذبحة الصدرية وجلطة القلب.</li>
<li>تصلب الشرايين.</li>
<li>رسم القلب العادي وبالمجهود.</li>
<li>فحص القلب بالموجات الصوتية (إيكو).</li>
<li>رسم القلب لمدة 24 ساعة (هولتر).</li>
</ul>',
            'address' => 'حي الجامعة - شارع السيرة العطرة',
            'phone' => '0126806666',
            'email' => 'hjh.info@andalusiagroup.net',
            'map_x' => '21.58323',
            'map_y' => '29.953463',
            'photo' => 'clinics\\January2020\\fuVVomxRgSDIEwQ6gogq.jpg',
            'meta_keywords' => 'عيادة أمراض القلب،امراض القلب،دكتور امراض القلب',
            'meta_description' => 'تضم عيادة أمراض القلب بمستشفى أندلسية حي الجامعة أمهر أطباء وخبراء القلب في المملكة والشرق الأوسط، لتقديم خدمة ورعاية أفضل للمرضى بدءاً من التشخيص إلى العلاج',
            'status' => 1,
            'created_at' => '2020-01-29 06:34:00',
            'updated_at' => '2020-02-05 14:30:44',
            'slug_ar' => 'ayadh-amradh-alqlb',
            'slug_en' => 'cardiac-diseases-clinic'
        ]);
//        Doctor::create([
//            'id' => 1,
//            'title_ar' => 'د. محمد المراغي',
//            'title_en' => 'Dr. Mohamed El Maraghy',
//            'description' => '<h6 style="text-align: right;">حاصل على درجة الدكتوراه في أمراض القلب والأوعية الدموية.</h6>
//<p>&nbsp;</p>
//<p style="text-align: right;">الحالات التي يعالجها الطبيب:-</p>
//<p>&nbsp;</p>
//<ul>
//<li style="text-align: right;">ضغط الدم وتصلب الشرايين.</li>
//<li style="text-align: right;">عدم انتظام ضربات القلب.</li>
//<li style="text-align: right;">أمراض القلب الروماتيزمية.</li>
//<li style="text-align: right;">أمراض صمامات القلب.</li>
//<li style="text-align: right;">أمراض الشرايين التاجية (جلطة القلب - الذبحة الصدرية).</li>
//<li style="text-align: right;">فشل عضلة القلب وتضخم عضلة القلب.</li>
//<li style="text-align: right;">جلطات الشرايين التاجية الحادة بالقسطرة.</li>
//<li style="text-align: right;">إجراء رسم القلب العادي وبالمجهود.</li>
//<li style="text-align: right;">رسم قلب لمدة 24 ساعة (هولتر).</li>
//<li style="text-align: right;">متابعة قياس الضغط 24 ساعة.</li>
//<li style="text-align: right;">إجراء القسطرة التشخيصية والعلاجية.</li>
//</ul>',
//            'position' => 'استشاري أمراض القلب',
//            'speciality' => 'أمراض القلب والأوعية الدموية',
//            'photo' => 'doctors\\January2020\\ViY69IHVYwAqem6d4xQo.jpg',
//            'meta_keywords' => 'د. محمد المراغي ',
//            'meta_description' => 'د. محمد المراغي استشاري أمراض القلب والأوعية الدموية',
//            'status' => 1,
//            'created_at' => '2020-01-29 06:37:00',
//            'updated_at' => '2020-02-05 14:31:02',
//            'slug_ar' => 'd-mhmd-almraghy',
//            'slug_en' => 'dr-mohamed-el-maraghy'
//        ]);
//
//
//        Doctor::create([
//            'id' => 2,
//            'title_ar' => 'د. سعيد رفعت',
//            'title_en' => 'Dr. Saeed Refaat',
//            'description' => '<h6 style="text-align: right;">حاصل على دكتوراه في جراحة القلب والصدر.</h6>
//<p style="text-align: right;">الحالات التي يعالجها الطبيب:-</p>
//<ul>
//<li style="text-align: right;">عمليات ترقيع الشرايين التاجية بالقلب المفتوح.</li>
//<li style="text-align: right;">ترقيع الشرايين التاجية بالقلب النابض.</li>
//<li style="text-align: right;">تغيير الصمام الميترالي.</li>
//<li style="text-align: right;">إصلاح ارتجاع الصمام الميترالي.</li>
//<li style="text-align: right;">تغيير الصمام الأورطي.</li>
//<li style="text-align: right;">ضيق وتمدد الشريان الأورطي.</li>
//<li style="text-align: right;">حالات الارتشاح البلوري.</li>
//<li style="text-align: right;">أورام الرئة والجهاز التنفسي.</li>
//<li style="text-align: right;">كسر الضلوع.</li>
//<li style="text-align: right;">ثقب القلب الوراثي.</li>
//</ul>',
//            'position' => 'استشاري جراحة القلب والصدر',
//            'speciality' => 'جراحة القلب والصدر',
//            'photo' => 'doctors\\January2020\\xkWJnCnPNZx8lDoQuIqh.jpg',
//            'meta_keywords' => '',
//            'meta_description' => 'دكتور قلب',
//            'status' => 1,
//            'created_at' => '2020-01-29 06:40:00',
//            'updated_at' => '2020-02-07 18:35:01',
//            'slug_ar' => 'd-sayd-rfat',
//            'slug_en' => 'dr-saeed-refaat'
//        ]);
//
//
//        Doctor::create([
//            'id' => 3,
//            'title_ar' => 'د. إيمان عبد العزيز',
//            'title_en' => 'Dr. Eman Abdel Aziz',
//            'description' => '<h6 style="text-align: right;">حاصلة على ماجستير الأمراض الجلدية والتناسلية وطب الذكورة.</h6>
//<p>الحالات التي تعالجها الطبيبة:-</p>
//<ul>
//<li style="text-align: right;">التهاب الجلد والحكة والحساسية.</li>
//<li style="text-align: right;">البقع الجلدية البيضاء والملونة والهالات السوداء.</li>
//<li style="text-align: right;">السنطات والزوائد الجلدية.</li>
//<li style="text-align: right;">حب الشباب وآثاره.</li>
//<li style="text-align: right;">فطريات الجلد والأظافر.</li>
//<li style="text-align: right;">الصدفية والسمكية والبهاق.</li>
//<li style="text-align: right;">مشاكل الشعر من ضعف وسقوط وقشور.</li>
//<li style="text-align: right;">الصلع وعلاج الشعر الزائد، والقرح والأورام الجلدية.</li>
//<li style="text-align: right;">التهابات الجهاز التناسلي.</li>
//<li style="text-align: right;">العلاجات التجميلية للجلد.</li>
//<li style="text-align: right;">جلسات الميزوثيرابي.</li>
//<li style="text-align: right;">حقن البلازما للبشرة (PRP).</li>
//<li style="text-align: right;">تحليل الفطريات.</li>
//<li style="text-align: right;">مزرعة جلد وأظافر وشعر.</li>
//<li style="text-align: right;">أخذ مسحة من الجلد.</li>
//<li style="text-align: right;">جميع التحاليل الخاصة بالذكورة والعقم والضعف الجنسي والأمراض الجلدية المزمنة.</li>
//<li style="text-align: right;">تحاليل ما قبل الزواج للذكور.</li>
//</ul>',
//            'position' => 'أخصائي الأمراض الجلدية',
//            'speciality' => 'الأمراض الجلدية',
//            'photo' => 'doctors\\January2020\\2PoIKG1NnZibdwklOnJW.jpg',
//            'meta_keywords' => '',
//            'meta_description' => '',
//            'status' => 1,
//            'created_at' => '2020-01-29 06:45:00',
//            'updated_at' => '2020-02-24 08:02:34',
//            'slug_ar' => 'د-ايمان-عبد-العزيز',
//            'slug_en' => 'dr-eman-abdel-aziz'
//        ]);


        Service::create([
            'id' => 1,
            'name_ar' => 'وحدة قسطرة القلب',
            'name_en' => 'The Cardiac Catheterization Unit',
            'small_description' => 'حرصاً من مستشفى حي الجامعة على تقديم أفضل الرعاية الطبية الدقيقة للمرضى، تشمل رعايتنا توفير وحدة خاصة بقسطرة القلب تم تأسيسها من أجل تقديم العناية والاهتمام المطلوبين للحالات التي تحتاج إلى قسطرة القلب، وذلك من خلال توفير عدد كافي من الأسرة بالمستشفى بالإضافة إلى أحدث وأدق الأجهزة والتقنيات اللازمة لرعاية المريض ومتابعته أثناء وبعد إجراء القسطرة.',
            'description' => '<p>حرصاً من مستشفى حي الجامعة على تقديم أفضل الرعاية الطبية الدقيقة للمرضى، تشمل رعايتنا توفير وحدة خاصة بقسطرة القلب تم تأسيسها من أجل تقديم العناية والاهتمام المطلوبين للحالات التي تحتاج إلى قسطرة القلب، وذلك من خلال توفير عدد كافي من الأسرة بالمستشفى بالإضافة إلى أحدث وأدق الأجهزة والتقنيات اللازمة لرعاية المريض ومتابعته أثناء وبعد إجراء القسطرة.</p>
<p>وتوفر مستشفى حي الجامعة أيضاً العناية والرعاية اللازمة للمريض بعد إجراء قسطرة القلب، حيث يجب نقل المريض بعدها إلى غرفة رعاية مركزة ليخضع للملاحظة لمدة من الزمن يحددها الطبيب الخاص، يتم ملاحظة معدل ضربات القلب وقياس ضغط الدم بانتظام، وتوفير مراقبة مستمرة للمؤشرات الحيوية للقلب حتى يتعافى المريض.</p>',
            'photo' => 'services/10Cardiology.jpg',
            'meta_keywords' => '',
            'meta_description' => '',
            'status' => 1,
            'created_at' => '2020-01-29 06:10:00',
            'updated_at' => '2020-02-05 11:48:04',
            'slug_ar' => 'وحدة-قسطرة-القلب',
            'slug_en' => 'the-cardiac-catheterization-unit'
        ]);
        Slider::create([
            'id' => 1,
            'photo_ar' => 'sliders\\January2020\\uZbTrqEKaRibB8S0LBjS.jpg',
            'photo_en' => 'sliders\\January2020\\70Ow45LmLS8haYyyjKh9.jpg',
            'link' => 'http://tawfek.tk/ar',
            'status' => 1,
            'created_at' => '2020-01-29 06:28:47',
            'updated_at' => '2020-01-29 06:30:18'
        ]);


        Slider::create([
            'id' => 2,
            'photo_ar' => 'sliders\\January2020\\wtbx6osMEoLdtAYwj3f0.jpg',
            'photo_en' => 'sliders\\January2020\\McXT73mj1asWVcINDlcF.jpg',
            'link' => 'http://tawfek.tk/arabic',
            'status' => 1,
            'created_at' => '2020-01-29 06:29:34',
            'updated_at' => '2020-02-24 07:18:51'
        ]);


        Slider::create([
            'id' => 3,
            'photo_ar' => 'sliders\\January2020\\IacT4Ln8tMPI0d581OAF.jpg',
            'photo_en' => 'sliders\\January2020\\4kBBO0BLTEVNf6RKopds.jpg',
            'link' => 'http://tawfek.tk/test/ar',
            'status' => 1,
            'created_at' => '2020-01-29 06:30:12',
            'updated_at' => '2020-02-24 07:18:50'
        ]);
        Tag::create([
            'id' => 1,
            'name' => 'أسباب التشوهات الخلقية عند الجنين',
            'slug' => 'أسباب-التشوهات-الخلقية-عند-الجنين',
            'description' => '',
            'created_at' => '2020-01-29 07:10:07',
            'updated_at' => '2020-01-29 07:10:07'
        ]);


        Tag::create([
            'id' => 2,
            'name' => 'أعراض سرطان الثدى',
            'slug' => 'أعراض-سرطان-الثدى',
            'description' => '',
            'created_at' => '2020-01-29 07:10:00',
            'updated_at' => '2020-01-29 09:06:14'
        ]);
        Post::create([
            'id' => 1,
            'author_id' => 1,
            'category_id' => 2,
            'title' => 'عملية تغيير مفصل الركبة',
            'seo_title' => 'عملية تغيير مفصل الركبة',
            'excerpt' => 'تعتبر من أدق عمليات العظام التي تحتاج للخبرة والمهارة في إجراءها لتجنب حدوث أي مضاعفات، ويتم إجراء هذة العملية نتيجة تعرض المفصل للضرر الشديد',
            'body' => "<p style=\"text-align: right;\"><strong>عملية تغيير مفصل الركبة</strong></p>
<h2 style=\"direction: rtl;\"><strong>عملية تغيير مفصل الركبة</strong></h2>
<p style=\"text-align: right;\">تعتبر من أدق عمليات العظام التي تحتاج للخبرة والمهارة في إجراءها لتجنب حدوث أي مضاعفات، ويتم إجراء هذة العملية نتيجة تعرض المفصل للضرر الشديد أو للتآكل مما يسبب آلام قوية يصعب تحملها وتؤدي لصعوبة في الحركة، وهنا العملية هي الحل الأمثل للتخلص من هذه الآلام المزعجة وامتلاك القدرة على ممارسة الأنشطة اليومية بسهولة.</p>
<p style=\"direction: rtl;\">تحتاج هذة العملية لإجراء الكثير من الفحوصات والتحاليل قبل العملية للتأكد من أنها الحل المناسب والأخير للقضاء على آلام الركبة والقدرة على الحركة بشكل سليم.</p>
<p style=\"direction: rtl;\">وفي العملية يتم استبدال المفصل الطبيعي بآخر صناعي مصنوع من التيتانيوم أو البلاستيك القوي، ويتم إجراءها تحت تأثير التخدير الموضعي أو الكلي حسب ما يحدده الطبيب.</p>
<h3 style=\"direction: rtl;\"><strong><u>تنقسم </u></strong><strong><u>عملية تغيير المفصل </u></strong><strong><u>إلى نوعين وهما :-</u></strong></h3>
<p style=\"direction: rtl;\"><strong>- تغيير كلي لمفصل الركبة.</strong></p>
<p style=\"direction: rtl;\">حيث يتم تغيير المفصل بالكامل نتيجة حدوث تضرر أو تآكل المفصل بالكامل.</p>
<p style=\"direction: rtl;\"><strong>- تغيير جزئي لمفصل الركبة.</strong></p>
<p style=\"direction: rtl;\">حيث يتم تغيير الجزء المتضرر فقط من المفصل، <u>وذلك ضمن شروط معينة وهي:-</u></p>
<p style=\"direction: rtl;\">- أن يكون الرباط الصليبي الأمامي سليمًا.</p>
<p style=\"direction: rtl;\">- وأن يكون النصف الخارجي من المفصل سليمًا.</p>
<p style=\"direction: rtl;\">- أن يكون مقدار الاعوجاج أقل من 15 درجة.</p>
<h3 style=\"direction: rtl;\"><strong><u>6 أسباب لإجراء </u></strong><strong><u>عملية مفصل الركبة&nbsp;</u></strong><strong><u>:</u></strong></h3>
<p style=\"direction: rtl;\">يلجأ الطبيب لإجراء تغيير المفصل الركبة للحالات التي لا تتحمل الآلام والضغط على الركبة ومن هذه الحالات:-</p>
<p style=\"direction: rtl;\"><strong>1- هشاشة العظام</strong>:</p>
<p style=\"direction: rtl;\">وتعتبر هشاشة العظام من الأسباب الرئيسية لإجراء العملية حيث يصبح المفصل ضعيف وهش غير قادر على تحمل المزيد من الضغط عليه.</p>
<p style=\"direction: rtl;\"><strong>2- خشونة الركبة</strong>:</p>
<p style=\"direction: rtl;\">الخشونة هي تآكل لغضروف الركبة ومن ثم تآكل المفصل نفسه وفي الحالات المتقدمة يصبح المفصل غير قادر على امتصاص الصدمات مما يعوق الحركة بشكل كبير أو يمنعها نسبياً.</p>
<p style=\"direction: rtl;\"><strong>3- زيادة الوزن</strong>:</p>
<p style=\"direction: rtl;\">تشكل السمنة خطراً &nbsp;كبيراً على مفصل الركبة لأن الوزن الزائد يؤدي إلى زيادة الضغط على المفصل و</p>
<p style=\"direction: rtl;\">تآكل الغضروف.</p>
<p style=\"direction: rtl;\"><strong>4- الإصابات الخارجية</strong>:</p>
<p style=\"direction: rtl;\">كالإصابات التي تحدث في الملاعب أو إصابات الحوادث والكسور.</p>
<p style=\"direction: rtl;\"><strong>5- الاستئصال الجزئي للغضروف المفصلي للركبة</strong>:</p>
<p style=\"direction: rtl;\">بعد هذا الاستئصال يفقد المفصل قدرته على امتصاص الصدمات فقد تحتاج بعض الحالات حينها لاستبدال المفصل.</p>
<p style=\"direction: rtl;\"><strong>6- التهاب المفاصل الروماتويدي</strong>:</p>
<p style=\"direction: rtl;\">تسبب الالتهابات الروماتويدية آلام شديدة لا تُحتمل في المفاصل وقد تؤدي في النهاية إلى تشوه كامل في المفصل فيضطر الطبيب لإجراء عملية تبديل مفصل الركبة.</p>
<h3 style=\"direction: rtl;\"><strong><u>علامات تستدعي إجراء </u></strong><strong><u>عملية تغيير مفصل الركبة&nbsp;</u></strong><strong><u>:-</u></strong></h3>
<p style=\"direction: rtl;\">- حدوث تآكل في مفصل أو غضروف الركبة.</p>
<p style=\"direction: rtl;\">- آلام شديدة في الركبة وتظهر خاصة في أوقات الراحة وأثناء النوم ليلاً.</p>
<p style=\"direction: rtl;\">- التيبس والتصلب في مفصل الركبة لأنه يسبب صعوبة في ممارسة الأنشطة اليومية كصعوبة في ارتداء الملابس أو الأحذية وغيرها من الأنشطة اليومية المعتادة.</p>
<p style=\"direction: rtl;\">- صعوبة في المشي.</p>
<p style=\"direction: rtl;\">- محدودية الحركة وعدم قيام المفصل بأداء وظيفته كاملة. <img class=\"aligncenter wp-image-2948 size-medium\" src=\"https://www.andalusiahjh.com/wp-content/uploads/2020/01/عملية-تغيير-مفصل-الركبة-فى-السعودية-300x200.jpg\" alt=\"عملية تغيير مفصل الركبة فى السعودية\" width=\"300\" height=\"200\" /></p>
<h3 style=\"direction: rtl;\"><strong><u>4 خطوات هامة قبل </u></strong><strong><u>عـملية تغيير مـفصل الركبة</u></strong><strong><u>:-</u></strong></h3>
<p style=\"direction: rtl;\">قبل إجراء عملية تبديل مفصل الركبة يقوم الطبيب بتحديد الفحوصات والتحاليل التي يحتاجها المريض وهي:-</p>
<p style=\"direction: rtl;\">- إجراء أشعة رنين مغناطيسي أو أشعة سينية على الركبة.</p>
<p style=\"direction: rtl;\">- إجراء تحاليل للدم كصورة دم كاملة، وتخثر الدم، وكيمياء الدم، ووظائف الكلى والكبد.</p>
<p style=\"direction: rtl;\">- إجراء فحص البول.</p>
<p style=\"direction: rtl;\">- إجراء تخطيط كهربية القلب (رسم القلب).</p>
<p style=\"direction: rtl;\">وإذا كان المريض يتناول أدوية معينة يحدد الطبيب الأدوية التي يجب التوقف عن تناولها قبل العملية.</p>
<h3 style=\"direction: rtl;\"><strong><u>هل تظهر مضاعفات بعد </u></strong><strong><u>عملية تغيير مفصل الركبة</u></strong></h3>
<p style=\"direction: rtl;\">في بعض الحالات قد تظهر بعض المضاعفات مثل:</p>
<p style=\"direction: rtl;\">- حدوث تورم والتهابات وآلام في المفصل.</p>
<p style=\"direction: rtl;\">- التعرض لكسور في عظام الركبة.</p>
<p style=\"direction: rtl;\">- حدوث تصلب في مفصل الركبة.</p>
<p style=\"direction: rtl;\">- حدوث ضرر في العصب أو العضلات.</p>
<p style=\"direction: rtl;\">ولكن هناك بعض الشروط التي قد تحميك من هذه المضاعفات وتساعد في نجاح عملية تبديل مفصل الركبة وهي..</p>
<p style=\"direction: rtl;\">- إجراء العملية تحت إشراف طبيب عظام ماهر ومتخصص وله خبرة في إجراء عملية تبديل مفصل الركبة لمرات عديدة.</p>
<p style=\"direction: rtl;\">- التأكد من جودة نوع المفصل المستخدم.</p>
<p style=\"direction: rtl;\">- التخلص من الوزن الزائد قبل إجراء الجراحة.</p>
<p style=\"direction: rtl;\">- عمل جلسات علاج طبيعي بعد إجراء الجراحة.</p>
<p style=\"direction: rtl;\">-اتباع تعليمات الطبيب للحفاظ على المفصل لأطول فترة ممكنة.</p>
<h3 style=\"direction: rtl;\"><strong><u>أهمية العلاج الطبيعي بعد </u></strong><strong><u>عملية تغيير مفصل الركبة&nbsp;</u></strong><strong><u>:-</u></strong></h3>
<p style=\"direction: rtl;\">- يعد العلاج الطبيعي من أهم خطوات التعافي بعد عملية تبديل مفصل الركبة، وللحفاظ على مفصل الركبة الذي تم استبداله.</p>
<p style=\"direction: rtl;\">- يعمل العلاج الطبيعي على تقوية عضلات الساق الضعيفة، لأن قوة العضلات تساعد في تخفيف ضغط وزن الجسم على مفاصل الركبة.</p>
<h3 style=\"direction: rtl;\"><strong><u>بعد </u></strong><strong><u>عملية تبديل مفصل الركبة</u></strong><strong><u> تعرف على أنواع تمارين العلاج الطبيعي</u></strong></h3>
<p style=\"direction: rtl;\">تتنوع تمارين العلاج الطبيعي لتناسب تفاصيل كل حالة ومن هذه التمارين..</p>
<p style=\"direction: rtl;\">- العلاج المائي، لعلاج آلام العضلات الناتجة عن إجراء الجراحة، والشعور بالراحة والاسترخاء.</p>
<p style=\"direction: rtl;\">- تمارين التوازن والإطالة والتقوية.</p>
<p style=\"direction: rtl;\">- استخدام النبضات الكهربائية لتنشيط وتقوية العضلات.</p>
<p style=\"direction: rtl;\">- استخدام الأشعة تحت الحمراء لتخفيف الألم والالتهابات، حيث أن حرارتها تساعد على توسيع الأوعية الدموية التي تخفف من الشعور بالألم بشكل كبير.</p>
<p style=\"direction: rtl;\">- تدليك الأنسجة العميقة للتخفيف من تشنجات العضلات وتقليل الالتهابات.</p>
<p style=\"direction: rtl;\">- العلاج بالترددات الاهتزازية لتقوية العضلات وزيادة نشاط الأعصاب.</p>
<h4 style=\"direction: rtl;\"><strong><u>نصائح هامة بعد العملية&nbsp;</u></strong><strong><u>:-</u></strong></h4>
<p style=\"direction: rtl;\">- الراحة التامة في الفراش ووضع الساق في خط مستقيم لتسهيل تدفق الدم والتخفيف من الألم.</p>
<p style=\"direction: rtl;\">- الانتظام في تناول الأدوية كما يصفها الطبيب لتمام التعافي من آثار العملية.</p>
<p style=\"direction: rtl;\">- استخدام كمادات الثلج على مفصل الركبة في البداية بعد إجراء عملية تبديل مفصل الركبة، فالثلج يساعد على تخدير منطقة المفصل وبالتالي تقليل الشعور بالألم والتخفيف من الالتهابات.</p>
<p style=\"direction: rtl;\">- بعد التئام الجرح يمكن استخدام كمادات المياه الساخنة للتخفيف من الألم وزيادة الشعور بالراحة والاسترخاء.</p>
<p style=\"direction: rtl;\">- يمكن استخدام العكاز أو الكرسي المتحرك مؤقتاً خلال الأيام الأولى من إجراء الجراحة عند القيام بأي نشاط معين، وذلك لتجنب زيادة الضغط على المفصل أثناء المشي أو الجلوس.</p>
<p style=\"direction: rtl;\">- الانتظام في عمل جلسات العلاج الطبيعي.</p>
<p style=\"direction: rtl;\">- الالتزام بممارسة التمارين المنزلية التي يحددها الطبيب بانتظام للحفاظ على سلامة مفصل الركبة لأطول فترة ممكنة.</p>
<p style=\"direction: rtl;\">- تجنب ثني الركبة أثناء الجلوس أو القفز خلال الأسابيع الأولى من إجراء عملية تبديل مفصل الركبة.</p>
<p style=\"direction: rtl;\">- تجنب استخدام السلم لعدم الضغط علي الركبة التي تم إجراء العملية بها.</p>
<p style=\"direction: rtl;\">- تجنب قيادة السيارة نهائياً حتى تمام التعافي من العملية والقدرة على تحريك المفصل بشكل سليم.</p>
<p style=\"direction: rtl;\">- الالتزام بعمل الفحص الدوري لمفصل الركبة من خلال الأشعة للتأكد من أن المفصل يعمل بكفاءة وعدم وجود أي خلل في المفصل أو عظام الركبة.</p>
<p style=\"direction: rtl;\">- النوم على سرير مرتفع للقيام من عليه بسهولة وعدم الشعور بألم.</p>
<p style=\"direction: rtl;\">- الحفاظ على وزن الجسم لتجنب زيادة الضغط على مفصل الركبة.</p>
<p style=\"direction: rtl;\">ومع الإلتزام بهذه النصائح وتعليمات <a href=\"https://www.andalusiahjh.com/doctors/\">الطبيب</a>، يستعيد المفصل قوته وأداء وظيفته كاملة حيث يمكنك العودة لممارسة أنشطتك اليومية بسهولة ودون عناء.</p>
<h3 style=\"direction: rtl;\"><strong>تعرف ايضاً علي :&nbsp;</strong></h3>
<p style=\"direction: rtl;\"><a href=\"https://www.andalusiahjh.com/%d8%b9%d9%84%d8%a7%d8%ac-%d8%a7%d8%b1%d8%aa%d9%81%d8%a7%d8%b9-%d8%a7%d9%84%d9%83%d9%88%d9%84%d9%8a%d8%b3%d8%aa%d8%b1%d9%88%d9%84/\"><strong>علاج ارتفاع الكوليسترول</strong></a></p>
<p style=\"direction: rtl;\"><strong><a href=\"https://www.andalusiahjh.com/%d8%ac%d9%84%d8%b7%d8%a9-%d8%a7%d9%84%d9%82%d9%84%d8%a8/\">جلطة القلب</a> و طرق التعامل معها.</strong></p>
<p style=\"direction: rtl;\"><a href=\"https://www.andalusiahjh.com/%d8%b9%d9%84%d8%a7%d8%ac-%d8%a7%d8%b6%d8%b7%d8%b1%d8%a7%d8%a8%d8%a7%d8%aa-%d8%a7%d9%84%d9%86%d9%88%d9%85/\"><strong>علاج اضطرابات النوم</strong></a></p>
<p><a href=\"https://www.andalusiahjh.com/clinic/q/%d8%b9%d9%8a%d8%a7%d8%af%d8%a9-%d8%a7%d9%84%d8%ac%d8%b1%d8%a7%d8%ad%d8%a9-%d8%a7%d9%84%d8%b9%d8%a7%d9%85%d8%a9\"><img class=\"aligncenter wp-image-2892 size-full\" src=\"https://www.andalusiahjh.com/wp-content/uploads/2019/08/sajil.png\" alt=\"سجل الان فى عيادات الجراحة العامة\" width=\"320\" height=\"101\" /></a></p>",
            'image' => 'posts\\February2020\\V8egCZUkNuLBg6CtuDwZ.jpg',
            'slug' => 'عملية-تغيير-مفصل-الركبة',
            'meta_description' => 'تعرف الان على عملية تغيير مفصل الركبة فى السعودية وعملية تغيير مفصل الفخذ وماهي النصائح وافضل طرق للوقاية من مضاعفاتها..',
            'meta_keywords' => 'عملية تغيير مفصل الركبة',
            'status' => 'PUBLISHED',
            'featured' => 0,
            'created_at' => '2020-02-19 08:03:12',
            'updated_at' => '2020-02-26 13:33:00'
        ]);
        \App\PostTag::create( [
            'id'=>1,
            'post_id'=>1,
            'tag_id'=>1,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );



        \App\PostTag::create( [
            'id'=>2,
            'post_id'=>1,
            'tag_id'=>2,
            'created_at'=>NULL,
            'updated_at'=>NULL
        ] );

    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field' => $field,
        ]);
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
