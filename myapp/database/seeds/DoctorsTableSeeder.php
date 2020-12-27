<?php

use Illuminate\Database\Seeder;
use App\Doctor;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Translation;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'doctors');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'doctors',
                'slug'                  => 'doctors',
                'display_name_singular' => 'Doctor',
                'display_name_plural'   => 'Doctors',
                'icon'                  => 'voyager-activity',
                'model_name'            => 'App\\Doctor',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
        //Data Rows
        $itemDataType = DataType::where('slug', 'doctors')->firstOrFail();
        $dataRowOrder   = 0;

        $dataRow = $this->dataRow($itemDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('voyager::seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'speciality_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "speciality_id")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'doctors_belongsto_speciality_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Speciality',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'model'       => 'App\\Speciality',
                    'table'       => 'specialities',
                    'type'        => 'belongsTo',
                    'column'      => 'speciality_id',
                    'key'         => 'id',
                    'label'       => 'name',
                    'pivot_table' => 'admins',
                    'pivot'       => '0',
                    'taggable'    => '0'
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'clinic_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "clinic_id")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'doctors_belongsto_clinic_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => 'Clinic',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'model'       => 'App\\Clinic',
                    'table'       => 'clinics',
                    'type'        => 'belongsTo',
                    'column'      => 'clinic_id',
                    'key'         => 'id',
                    'label'       => 'name_en',
                    'pivot_table' => 'admins',
                    'pivot'       => '0',
                    'taggable'    => '0'
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'title');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "title")),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order'        => $dataRowOrder++,
            ])->save();
        }

       
        $dataRow = $this->dataRow($itemDataType, 'slug');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "slug")),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order'        => $dataRowOrder++,
            ])->save();
        }

        

        $dataRow = $this->dataRow($itemDataType, 'description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'rich_text_box',
                'display_name' => ucwords(str_replace("_", " ", "description")),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'small_description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' =>"Small description",
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'position');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "position")),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'speciality');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "speciality")),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'photo');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => ucwords(str_replace("_", " ", "photo")),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'meta_keywords');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "meta_keywords")),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'meta_description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => ucwords(str_replace("_", " ", "meta_description")),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'status');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'radio_btn',
                'display_name' => ucwords(str_replace("_", " ", "status")),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => [
                    'default' => '0',
                    'options' => [
                        '0' => 'No',
                        '1' => 'Yes'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'email');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "email")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => ['required', 'regex:/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?(Andalusiagroup|andalusiagroup)\.net$/']
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'phone');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "phone")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'price');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => ucwords(str_replace("_", " ", "price")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'duration');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => ucwords(str_replace("_", " ", "duration_by_minutes")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'gender');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'select_dropdown',
                'display_name' => ucwords(str_replace("_", " ", "gender")),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 'male',
                    'options' => [
                        'male' => 'Male',
                        'female' => 'Female'
                    ],
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => $dataRowOrder++,
            ])->save();
        }

        $dataRow = $this->dataRow($itemDataType, 'order');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => ucwords(str_replace("_", " ", "Order")),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'validation' => [
                        'rule' => 'required'
                    ]
                ],
                'order' => $dataRowOrder++,
            ])->save();
        }

        //Menu Item
        $menu     = Menu::where('name', 'admin')->firstOrFail();
        $parent   = MenuItem::where('title', 'Doctors')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Doctors',
            'url'     => '',
            'route'   => 'voyager.doctors.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-activity',
                'color'      => null,
                'parent_id'  => $parent->id,
                'order'      => 1,
            ])->save();
        }

        //Permissions
        Permission::generateFor('doctors');

        //Content
        $data = [
            [
                'speciality_id'  => 1,
                'title'       => 'أكرم ماجد',
                'position'       => 'استشاري',
                'speciality'     => 'أخصائي طب الأسنان',
                'slug_ar'        => 'أكرم-ماجد',
                'slug_en'        => 'Akram-Maged',
                'description'    => 'بكالوريوس في طب وجراحة الفم والأسنان - الإجراءات والفحوصات التي تخص الأسنان- عمليات خلع الأسنان والخلع الجراحي- تنظيف الأسنان- بانوراما الأسنان - أشعة عادية على الأسنان بمستشفى حي الجامعة',
                'description_en' => 'Masters in oral and maxillofacial surgery - Dental checkup- Root canal treatment- Dental crowns- Bleaching- Panoramic X-ray- X-ray at Hai ElJamea Hospital',
                'email'          => 'AKRAM.MAGED@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '150',
                'gender'         => 'male'
            ],
            [
                'speciality_id'  => 2,
                'title'       => 'أحمد جابر',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائي أمراض القلب والأوعية الدموية',
                'slug_ar'        => 'أحمد-جابر',
                'slug_en'        => 'Ahmed-Gaber',
                'description'    => 'ماجيستر في أمراض القلب والأوعية الدموية--حالات ضغط الدم وتصلب الشرايين.- عدم انتظام ضربات القلب - أمراض القلب الروماتيزمية - أمراض صمامات القلب - أمراض الشرايين التاجية (جلطة القلب - الذبحة الصدرية- فشل عضلة القلب وتضخم عضلة القلب - علاج جلطات الشرايين التاجية الحادة بالقسطرة- إجراء رسم القلب العادي وبالمجهود - رسم قلب لمدة 24 ساعة (هولتر)-موجات صوتية على القلب-متابعة قياس الضغط 24 ساعة',
                'description_en' => '',
                'email'          => 'AHMED.JABER@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'male'
            ],
            [
                'speciality_id'  => 3,
                'title'       => 'مصطفى سلامة',
                'position'       => 'استشاري',
                'speciality'     => 'استشاري الجراحة العامة',
                'slug_ar'        => 'مصطفى-سلامة',
                'slug_en'        => 'Moustafa-Salama',
                'description'    => '"استشاري الجراحة العامة لفريقنا الطبي المميز بمستشفى أندلسية حي الجامعة.

خبرة أكثر من 15 عامًا في الجراحة العامة، وحاصل على دكتوراه في الجراحة العامة من جامعة الأزهر بالقاهرة، وعمل كأخصائي أول للجراحة العامة بمستشفى جامعة ابن سينا بجدة
"
',
                'description_en' => '',
                'email'          => 'Moustafa-Salama@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '150',
                'gender'         => 'male'
            ],
            [
                'speciality_id'  => 4,
                'title'       => 'عصام عبد الفتاح',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائي الأمراض الجلدية',
                'slug_ar'        => 'عصام-عبد-الفتاح',
                'slug_en'        => 'Essam-AbdelFattah',
                'description'    => 'ماجستير الأمراض الجلدية والتناسلية - التهاب الجلد والحكة والحساسية-البقع الجلدية البيضاء والملونة والهالات السوداء-السنطات والزوائد الجلدية-حب الشباب وآثاره',
                'description_en' => 'Masters in dermatology and venereal diseases - Skin inflammation and allergies-Acne-Skin and nails fungus-Hair related problems-Hairsutism-Skin ulcers-Urinary tract inflammation-Methotherapy treatment-PRP at Hai ElJamea Hospital',
                'email'          => 'Essam.AbdelFatah@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'male'
            ],
            [
                'speciality_id'  => 4,
                'title'       => 'هبة غازي',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائي الأمراض الجلدية',
                'slug_ar'        => 'هبة-غازي',
                'slug_en'        => 'Heba-Ghazy',
                'description'    => 'لحاصلة على بكالوريوس في الطب من جامعة الإسكندرية 2005م، والحاصلة أيضاً على ماجستير في الأمراض الجلدية والتناسلية، بالإضافة إلى دبلومة في الطب التجميلي والليزر.بمستشفى حي الجامعة',
                'description_en' => 'a Bachelor of Medicine from Alexandria University in 2005 and a Master in Dermatology and Venereal Diseases, as well as a Diploma in Aesthetic Medicine and Laser. at Hai ElJamea Hospital',
                'email'          => 'heba.ghazy@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'female'
            ],
            [
                'speciality_id'  => 5,
                'title'       => 'إبراهيم عيد',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائى أنف وأذن وحنجرة',
                'slug_ar'        => 'إبراهيم-عيد',
                'slug_en'        => 'Ibrahim-Eid',
                'description'    => 'ماجستير في الأنف والأذن والحنجرة -   علاج التهاب اللوزتين والحلق وخراج خلف اللوزتين- النزيف الدموي من الأنف- الزدات الأنفية والانسداد',
                'description_en' => 'Master degree in ENT - Treatment of Tonsillitis- Nose bleeding- Breath difficulties Sinusitis- Nose breaking- Vocal cords infection-Otis media- Hearing difficulties- Tympanic membrane rupture at Hai ElJamea Hospital',
                'email'          => 'IBRAHIM.EID@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'male'
            ],
            [
                'speciality_id'  => 6,
                'title'       => 'علاء الشامي',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائي أمراض الباطنة وأمراض الكلى',
                'slug_ar'        => 'علاء-الشامي',
                'slug_en'        => 'Alaa-AL-Shamy',
                'description'    => 'ماجستير أمراض الباطنة - علاج أمراض الجهاز الهضمي والكبد- أمراض سوء الامتصاص والهضم- قرحة المعدة والأثنى عشر- مناظير الجهاز الهضمي- الكبد الدهني وتضخم الكبد- التهابات البنكرياس- القولون العصبي- التشخيص المبكر لأورام الجهاز الهضمي- الغدد الصماء والاضطراب الهرموني- حمى (الضنك – النزفية – الانفلونزا)- حمى (التيفويد – المالطية)- تشخيص مرض السكري والوقاية من مضاعفاته- آلام المفاصل الروماتيزمية- الروماتويد والذئبة الحمراء والأمراض المناعية-  المغص والالتهابات الكلوية- الفشل الكلوي ومسبباته- منظار المعدة- منظار القولون- مناظير القنوات المرارية- تركيب بالون المعدة- ربط وحقن دوالي المرئ والمعدة- توسيع المرئ والقولون- استئصال اللحمية بالمنظار',
                'description_en' => 'Masters of gastroenterology - Digestive system diseases - Esophageal varices treatment.- Digestive system endoscopy.- Diagnosis and treatment of inflammatory bowel diseases- Gallbladder and bile duct diseases- Fatty liver and liver hypertrophy.- Stomach and duodenal ulcers.- Early detection of digestive system tumors- Typhoid fever- Diabetes- Kidney diseases',
                'email'          => 'ALAA.ELSHAMY@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'male'
            ],
            [
                'speciality_id'  => 7,
                'title'       => 'خالد عبد العزيز',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائي أمراض الجهاز الهضمي والكلى',
                'slug_ar'        => 'خالد-عبد-العزيز',
                'slug_en'        => 'Khaled-AbdelAziz',
                'description'    => 'ماجستير أمراض الباطنة - علاج أمراض الجهاز الهضمي والكبد- أمراض سوء الامتصاص والهضم- قرحة المعدة والأثنى عشر- مناظير الجهاز الهضمي- الكبد الدهني وتضخم الكبد- التهابات البنكرياس- القولون العصبي- التشخيص المبكر لأورام الجهاز الهضمي- الغدد الصماء والاضطراب الهرموني- حمى (الضنك – النزفية – الانفلونزا)- حمى (التيفويد – المالطية)- تشخيص مرض السكري والوقاية من مضاعفاته- آلام المفاصل الروماتيزمية- الروماتويد والذئبة الحمراء والأمراض المناعية-  المغص والالتهابات الكلوية- الفشل الكلوي ومسبباته- منظار المعدة- منظار القولون- مناظير القنوات المرارية- تركيب بالون المعدة- ربط وحقن دوالي المرئ والمعدة- توسيع المرئ والقولون- استئصال اللحمية بالمنظار بمستشفى حي الجامعة',
                'description_en' => 'Masters of gastroenterology - Digestive system diseases - Esophageal varies treatment.- Digestive system endoscopy.- Diagnosis and treatment of inflammatory bowel diseases- Gallbladder and bile duct diseases- Fatty liver and liver hypertrophy.- Stomach and duodenal ulcers.- Early detection of digestive system tumors- Typhoid fever- Diabetes- Kidney diseases at Hai ElJamea Hospital',
                'email'          => 'KHALID.ABDULATEF@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'male'
            ],
            [
                'speciality_id'  => 8,
                'title'       => 'عزت كريمة',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائي الامراض الباطنية',
                'slug_ar'        => 'عزت-كريمة',
                'slug_en'        => 'Ezzat-Karima',
                'description'    => 'ماجستير أمراض الباطنة - علاج أمراض الجهاز الهضمي والكبد- أمراض سوء الامتصاص والهضم- قرحة المعدة والأثنى عشر- مناظير الجهاز الهضمي- الكبد الدهني وتضخم الكبد- التهابات البنكرياس- القولون العصبي- التشخيص المبكر لأورام الجهاز الهضمي- الغدد الصماء والاضطراب الهرموني- حمى (الضنك – النزفية – الانفلونزا)- حمى (التيفويد – المالطية)- تشخيص مرض السكري والوقاية من مضاعفاته- آلام المفاصل الروماتيزمية- الروماتويد والذئبة الحمراء والأمراض المناعية- المغص والالتهابات الكلوية- الفشل الكلوي ومسبباته- منظار المعدة- منظار القولون- مناظير القنوات المرارية- تركيب بالون المعدة- ربط وحقن دوالي المرئ والمعدة- توسيع المرئ والقولون- استئصال اللحمية بالمنظار بمستشفى حي الجامعة',
                'description_en' => 'Master of Internal Medicine - Digestive system diseases.- Mal-absorption and Maldigestion diseas, - Digestive system endoscopy.- Diagnosis and treatment of inflammatory bowel diseases.- Fatty liver and liver hypertrophy.- Stomach and duodenal ulcers. - Early detection of digestive system tumors.- Typhoid fever- Diabetes,Kidney diseases,Rheumatoid, immunological diseases- Colic and renal infections- Renal failure and its causes- Gastroscopy- Colonoscopy- Installation of stomach balloon- Connect and inject varicose veins and stomach- Expansion of the esophagus and colon- Laparoscopic cholecystectomy at Hai ElJamea Hospital',
                'email'          => 'Ezzat.Karima@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'female'
            ],
            [
                'speciality_id'  => 9,
                'title'       => 'أسامة عبد السلام',
                'position'       => 'استشاري',
                'speciality'     => 'استشارى أمراض المخ و الأعصاب',
                'slug_ar'        => 'أسامة-عبد-السلام',
                'slug_en'        => 'Osama-AbdelSalam',
                'description'    => 'دكتوراه في الأمراض العصبية - الصرع- ضعف وضمور العضلات- أمراض الأعصاب المركزية والطرفية- شلل وآلام الأعصاب (الخامس والسابع)- الجلطات الدماغية والشلل- أمراض الذاكرة (الزهايمر)- الصداع بأنواعه- أمراض الحركة (الشلل الرعاش)- التهاب الأعصاب الطرفية- فقدان الذاكرة- أمراض الحبل الشوكي- رسم عصب- رسم عضلات بمستشفى حي الجامعة',
                'description_en' => 'Ph.D in Neurology - Vertebral column surgeries.- Brain and spinal cord tumors.- Strokes and brain hemorrhage.- Vertebral column fractures.- Peripheral nerves pain.- Headache- Dimensia at Hai ElJamea Hospital',
                'email'          => 'Osama.AbdelSalam@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '150',
                'gender'         => 'male'
            ],
            [
                'speciality_id'  => 10,
                'title'       => 'منال فوزي',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائى أمراض النساء والولادة',
                'slug_ar'        => 'منال-فوزي',
                'slug_en'        => 'Manal-Fawzy',
                'description'    => 'ماجيستير أمراض النساء والتوليد - التهابات الجهاز التناسلي-  آلام واضطرابات الدورة الشهرية- الوقاية والتشخيص المبكر للأورام- استئصال أورام الرحم والمبيض بالمنظار  (أكياس المبيض – الورم الليفي)- سقوط الرحم.- الأندومتريوزيس- متابعة مرحلة ما بعد انقطاع الطمث.- الولادة الطبيعية بدون ألم- الولادة القيصرية- جهاز قياس نبضات قلب الجنين CTG- حالات الحمل الحرج والإجهاض المتكرر- حالات الحمل خارج الرحم- تسمم الحمل- علاج عقم الزوجين- تنظيم الأسرة- إجراء اختبارات الحمل- مسحة عنق الرحم- إجراء الموجات فوق الصوتية',
                'description_en' => 'Master in Gynecology - Pregnancy and Delivery:- Critical pregnancy- Fertility clinic- Natural birth- Pregnancy poisoning (toxemia)- Repeated miscarriage- Ectopic pregnancy- Sterility (males and females)- Family planning- Complementary services:- 4D Ultrasound.- Menopause care and follow-up- Menstruation problems- Reproductive system problems- Uterine prolapse- Early detection of gynecologic cancers.- Cervical and ovarian cancer endoscopy',
                'email'          => 'MANAL.AHMED@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'female'
            ],
            [
                'speciality_id'  => 10,
                'title'       => 'شيماء عصام',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائى أمراض النساء والولادة',
                'slug_ar'        => 'شيماء-عصام',
                'slug_en'        => 'Shaimaa-Essam',
                'description'    => 'ماجستير في أمراض النساء والتوليد - التهابات الجهاز التناسلي-  آلام واضطرابات الدورة الشهرية- الوقاية والتشخيص المبكر للأورام- استئصال أورام الرحم والمبيض بالمنظار  (أكياس المبيض – الورم الليفي)- سقوط الرحم.- الأندومتريوزيس- متابعة مرحلة ما بعد انقطاع الطمث.- الولادة الطبيعية بدون ألم- الولادة القيصرية- جهاز قياس نبضات قلب الجنين CTG- حالات الحمل الحرج والإجهاض المتكرر- حالات الحمل خارج الرحم- تسمم الحمل- علاج عقم الزوجين- تنظيم الأسرة- إجراء اختبارات الحمل- مسحة عنق الرحم- إجراء الموجات فوق الصوتية',
                'description_en' => 'Masters in Gynecology - Pregnancy and Delivery:- Critical pregnancy- Fertility clinic- Natural birth- Pregnancy poisoning (toxemia)- Repeated miscarriage- Ectopic pregnancy- Sterility (males and females)- Family planning- Complementary services:- 4D Ultrasound.- Menopause care and follow-up- Menstruation problems- Reproductive system problems- Uterine prolapse- Early detection of gynecologic cancers.- Cervical and ovarian cancer endoscopy',
                'email'          => 'SHIMAA.HANAFY@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'female'
            ],
            [
                'speciality_id'  => 11,
                'title'       => 'نهير درويش',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائى أول نساء وولادة',
                'slug_ar'        => 'نهير-درويش',
                'slug_en'        => 'Nohier-Darweesh',
                'description'    => 'خبرة 15 سنة في طب النساء والولادة، وحاصلة على البورد العربي في اختصاص الولادة وأمراض النساء، وعلى بكالوريوس الطب والجراحة، وماجستير في أمراض النساء والولادة. بمستشفى حي الجامعة',
                'description_en' => '5 years of experience in Obstetrics and Gynecology at Hai ElJamea Hospital',
                'email'          => 'noheir.darwish@andaluisagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'female'
            ],
            [
                'speciality_id'  => 12,
                'title'       => 'محمد نصر',
                'position'       => 'استشاري',
                'speciality'     => 'استشارى طب و جراحة العيون',
                'slug_ar'        => 'محمد-نصر',
                'slug_en'        => 'Mohammed-Nasr',
                'description'    => 'محمد نصر استشاري طب وجراحة العيون والليزر لفريقنا الطبي بمستشفى أندلسية حي الجامعة.
استشاري جراحة العيون بوحدة الليزر بمستشفى قصر العيني، وعضو الجمعية الأوروبية لجراحة المياه البيضاء وإصلاح عيوب الإبصار، والجمعية الأوروبية لجراحة الشبكية، والأكاديمية الأمريكية للعيون، وحاصل على شهادة المجلس العالمي للعيون.',
                'description_en' => '',
                'email'          => 'm4nasr@yahoo.com',
                'phone'          => '12345678',
                'price'          => '150',
                'gender'         => 'male'
            ],
            [
                'speciality_id'  => 13,
                'title'       => 'محمود حرب',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائي أمراض العظام والمفاصل',
                'slug_ar'        => 'محمود-حرب',
                'slug_en'        => 'Mahmoud-Harb',
                'description'    => 'ماجستير في جراحة العظام - آلام والتهابات المفاصل- تمزق الأربطة- خلع المفاصل- إصابات غضروف الركبة- تمزق الرباط الصليبي الأمامي والخلفي- علاج الخلع المتكرر لمفصل الكتف- جراحات استبدال المفاصل والمفاصل الصناعية- تغيير مفصل الركبة- الكسور ومضاعفاتها (بطء الالتحام – الاعوجاج)- خشونة الركبة- آلم القدمين- حقن البلازما للركبة- الاستبدال الكلي لمفصل الركبة والكوع- عملية منظار الركبة ومناظير المفاصل- هشاشة العظام- التهابات وخشونة المفاصل- الطب الرياضي- عمليات العمود الفقري - عمليات تسليك الأعصاب والأوتار- تثبيت الكسور وعمليات الشرائح والمسامير - علاج العيوب الخلقية لعظام اليد',
                'description_en' => 'Masters in orthopedic Surgery -Surgeries and Endoscopy:-Knee Arthroscopy.-Ligament tear and tendons inflammation.- Cruciform ligaments.-Joints replacement (primary and advanced).- Complicated fractures.-Bone cancer surgeries.-Hand surgeries.- Specialized Clinics:-Knee surgeries-Vertebral column surgeries-Shoulder  surgeries-Pediatric surgeries - Sports Clinic:- Knee, shoulder and ankle joints injuries.-Tendons and ligaments conservative treatment.-Recurrent shoulder dislocation - Diagnosis and Treatment for-Osteoporosis - All bones pain conditions -Fracture reduction and fixation without surgery.',
                'email'          => 'MAHMOUD.HARB@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'male'
            ],
            [
                'speciality_id'  => 13,
                'title'       => 'محمد العشماوي',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائي أمراض العظام والمفاصل',
                'slug_ar'        => 'محمد-العشماوي',
                'slug_en'        => 'Mohammed-Ashmway',
                'description'    => 'خبرة 14 سنة في طب العظام، وحاصل على الماجستير والدكتوراه في طب العظام والكسور والإصابات، والزمالة الألمانية لطب',
                'description_en' => '14 years of experience in orthopedics, master\'s and doctorate in orthopedics, fractures and injuries, and German Orthopedic Fellowship at Hai ElJamea Hospital',
                'email'          => 'mohamedashmway@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'male'
            ],
            [
                'speciality_id'  => 14,
                'title'       => 'منصور عبد الله',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائى طب الأطفال',
                'slug_ar'        => 'منصور-عبد-الله',
                'slug_en'        => 'Mansour-Abdullah',
                'description'    => 'ماجستير في طب الأطفال - الفحص الشامل بعد الولادة- متابعة وعلاج الصفراء لحديثي الولادة- مشاكل الرضاعة- أمراض الجهاز التنفسي والهضمي لحديثي الولادة - التهاب الشعب الهوائية والالتهاب الرئوي - الحساسية والربو- الكحة المزمنة - الحمى الروماتيزمية على القلب- الالتهاب الكبدي- التهاب الكلى- تطعيمات الأطفال ',
                'description_en' => 'Masters in pediatric medicine -New born Full checkup- Neonatal Jaundice- Respiratory and digestive diseases in newborn- Bronchoinflammation-Asthma-Chronic cough-Diarrhea or conistipation and vomiting-Hepatitis-Nephritis-Vaccination',
                'email'          => 'MANSOR.ABDULLAH@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'female'
            ],
            [
                'speciality_id'  => 14,
                'title'       => 'ميرفت عبد الحميد',
                'position'       => 'أخصائي',
                'speciality'     => 'أخصائى طب الأطفال',
                'slug_ar'        => 'ميرفت-عبد-الحميد',
                'slug_en'        => 'Mervat-AbdElhamid',
                'description'    => 'ماجستير في طب الأطفال - الفحص الشامل بعد الولادة- متابعة وعلاج الصفراء لحديثي الولادة- مشاكل الرضاعة- أمراض الجهاز التنفسي والهضمي لحديثي الولادة - التهاب الشعب الهوائية والالتهاب الرئوي - الحساسية والربو- الكحة المزمنة - الحمى الروماتيزمية على القلب- الالتهاب الكبدي- التهاب الكلى- تطعيمات الأطفال',
                'description_en' => 'Masters in pediatric medicine -New born Full checkup- Neonatal Jaundice- Respiratory and digestive diseases in newborn- Bronchoinflammation-Asthma-Chronic cough-Diarrhea or conistipation and vomiting-Hepatitis-Nephritis--Vaccination',
                'email'          => 'MERVAT.DEGHED@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '75',
                'gender'         => 'female'
            ],
            [
                'speciality_id'  => 15,
                'title'       => 'محمد إفريج',
                'position'       => 'استشاري',
                'speciality'     => 'استشاري المسالك البولية',
                'slug_ar'        => 'محمد-إفريج',
                'slug_en'        => 'Mohammed-Efrieg',
                'description'    => 'أخصائي اول المسالك البوليه -  ماجستير  في جراحة المسالك البوليه -علاج حصوات الكلى وتفتيتها وحصوات المسالك البولية -مناظير الجهاز البولي (الكلى – الحالب - المثانية) -العيوب الخلقية في الكلى والحالب والمثانة -ضيق وانسداد مجرى البول -المغص الكلوي المتكرر -أورام الجهاز البولي التناسلي-سلس البول والبول الدومي - أمراض الذكورة والعقم والعجز الجنسي عند الرجال -علاج أمراض البروستاتا والكشف الدوري- تفتيت الحصوات عن طريق جهاز الموجات التصادمية -تفتيت حصوات الكلى بالليزر عن طريق منظار الكلى -تفتيت حصوات المثانة باستخدام المفتت الهوائي والليزر -تفتيت حصوات الحالب باستخدام المفتت الهوائي الكلوي-وحدة مسالك الأطفال-علاج تشوهات الجهاز البولي التناسلي للأطفال-تصليح فتحة مجرى البول- تصليح إعوجاج القضيب-تصليح ضيق حوض الكلى-تصليح الارتجاع البولي من المثانة للحالب جراحياً وبدون جراحة .بمستشفى حي الجامعة',
                'description_en' => 'Urology Specialist -Masters degree in urological -Kidney stones and urinary tract stones -Endoscopy of the urinary system (kidneys - ureter - bladder) -Congenital defects in the kidneys -ureters and bladder Tightness and obstruction of the urethra -Frequent renal colic Tumors of the genitourinary system Urinary -incontinence and bloody urine Menopause -infertility and disability of men -Treatment of prostate diseases and periodic detection-Crushing the stones through the collision-wave device-Laser kidney stones are dissected by renal endoscopy-Bladder stones dissection using the air diffuser and laser-Dissect the ureteral stones using the air splitter-Treatment of causes of renal failure-A diet for patients with renal failure-Repair of the urethra-Repair of penis warp-Narrow pelvic tubular repair-Repair of urinary bladder recovery of the ureter surgically and without surgery.at Hai ElJamea Hospital',
                'email'          => 'Mohamed.Efrieg@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '150',
                'gender'         => 'male'
            ],
            [
                'speciality_id'  => 16,
                'title'       => 'رانيا الباز',
                'position'       => 'استشاري',
                'speciality'     => 'استشارى أمراض النفسية',
                'slug_ar'        => 'رانيا-الباز',
                'slug_en'        => 'Rania-Elbaz',
                'description'    => 'استشاري الامراض النفسية -دكتوراه في الامراض النفسيه -استشارات نفسية -متابعة مرضي الاكتئاب و الزهايمر-أضطرابات المزاج  -اكتئاب الحمل و ما بعد الولادة  -التدريب على تنمية مهارات أولياء الامور-العلاج السلوكي -التدريب على المهارات الاجتماعية. بمستشفى حي الجامعة',
                'description_en' => 'Psychoneurosis Consultant -Psychiatry consultation -follow up patients of Depression -mood swings -Al zhahmir -Pregnancy and after delivery depression -Behavioral enhancement -social communication. at Hai ElJamea Hospital',
                'email'          => 'Rania.ELBaz@andalusiagroup.com',
                'phone'          => '12345678',
                'price'          => '150',
                'gender'         => 'female'
            ],
            [
                'speciality_id'  => 17,
                'title'       => 'أهداف عنان',
                'position'       => 'استشاري',
                'speciality'     => 'استشارى الأمراض الصدرية',
                'slug_ar'        => 'أهداف-عنان',
                'slug_en'        => 'Ahdaf-Anan',
                'description'    => '',
                'description_en' => '',
                'email'          => 'AHDAF.ANNAN@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '150',
                'gender'         => 'female'
            ],
            [
                'speciality_id'  => 17,
                'title'       => 'نبيل هيبة',
                'position'       => 'استشاري',
                'speciality'     => 'استشارى الأمراض الصدرية',
                'slug_ar'        => 'نبيل-هيبة',
                'slug_en'        => 'Nabil-Heba',
                'description'    => '',
                'description_en' => '',
                'email'          => 'NABIL.HIBAH@andalusiagroup.net',
                'phone'          => '12345678',
                'price'          => '150',
                'gender'         => 'female'
            ]
        ];
        foreach ($data as $item)
        {
            $doctor = Doctor::create([
                'speciality_id'    => $item['speciality_id'],
                'title'         => $item['title'],
                'description'      => $item['description'],
                'position'         => $item['position'],
                'speciality'       => $item['speciality'],
                'photo'            => "doctors\Appdoctorphotos\\{$item['slug_en']}.jpg",
                'meta_keywords'    => '',
                'meta_description' => '',
                'status'           => 1,
                'slug'             => $item['slug'],
                'email'            => $item['email'],
                'phone'            => $item['phone'],
                'price'            => $item['price'],
                'duration'         => '15',
                'gender'           => $item['gender']
            ]);

            Translation::create([
                'table_name'  => 'doctors',
                'column_name' => 'description',
                'foreign_key' => $doctor->id,
                'locale'      => 'en',
                'value'       => $item['description_en']
            ]);

            Translation::create([
                'table_name'  => 'doctors',
                'column_name' => 'position',
                'foreign_key' => $doctor->id,
                'locale'      => 'en',
                'value'       => $item['position'] == 'استشاري' ? 'consultant' : 'specialist'
            ]);
        }

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
            'field'        => $field,
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
