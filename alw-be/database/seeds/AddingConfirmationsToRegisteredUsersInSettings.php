<?php

use Illuminate\Database\Seeder;
use App\Setting;

class AddingConfirmationsToRegisteredUsersInSettings extends Seeder
{
    /**
     * Confirmations
     *
     * @return void
     */
    public function run()
    {
//        Setting::create( [
//            'key'=>'notification.user_new',
//            'display_name'=>'new user',
//            'value'=>'<table class="MsoTableGrid" style="margin-left: 28.5pt; border-collapse: collapse; border: none; mso-border-alt: solid windowtext .5pt; mso-yfti-tbllook: 1184; mso-padding-alt: 0in 5.4pt 0in 5.4pt;" border="1" cellspacing="0" cellpadding="0">
//<tbody>
//<tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes; height: 16.85pt;">
//<td style="width: 79.25pt; border: solid windowtext 1.0pt; mso-border-alt: solid windowtext .5pt; background: #9CC2E5; mso-background-themecolor: accent1; mso-background-themetint: 153; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
//<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">Email Topic</span></strong></p>
//</td>
//<td style="width: 331.7pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #9CC2E5; mso-background-themecolor: accent1; mso-background-themetint: 153; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
//<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;">مرحباً بك في خدمة أندلسية</span><span dir="LTR" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext; mso-bidi-language: AR-EG;"> DotCare</span></p>
//</td>
//</tr>
//<tr style="mso-yfti-irow: 1; mso-yfti-lastrow: yes; height: 16.85pt;">
//<td style="width: 79.25pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: #9CC2E5; mso-background-themecolor: accent1; mso-background-themetint: 153; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
//<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
//<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
//<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
//<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
//<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">Registration </span></strong></p>
//</td>
//<td style="width: 331.7pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .5pt; mso-border-left-alt: solid windowtext .5pt; mso-border-alt: solid windowtext .5pt; background: white; mso-background-themecolor: background1; padding: 0in 5.4pt 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
//<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">عزيزي سيد\ [[user_name]]</span></p>
//<p class="MsoNormal" style="margin-bottom: .0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
//<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">لقد تم التسجيل في خدمة الــ</span></strong><strong><span dir="LTR" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">DotCare</span></strong><strong><span lang="AR-EG" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0; mso-bidi-language: AR-EG;"> بنجاح</span></strong></p>
//<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
//<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26.0pt; font-family: \'Arabic Typesetting\'; color: #7030a0;">لحجز أول موعد أونلاين</span></strong></p>
//<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">اضغط على الرابط التالي:</span></p>
//<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><a href="https://www.andalusia.care/user/person/online-consultation"><span dir="LTR">https://www.andalusia.care/user/person/online-consultation</span></a></p>
//<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
//<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;">ويمكنك حجز استشارة منزلية من خلال الرابط التالي:</span></p>
//<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span style="color: black; mso-color-alt: windowtext;"><a href="https://page.andalusiahjh.com/home-care-go"><span dir="LTR">https://page.andalusiahjh.com/home-care-go</span></a></span></p>
//<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-family: \'Arial\',sans-serif; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-bidi-theme-font: minor-bidi;">&nbsp;</span></p>
//<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: red;"><span style="mso-spacerun: yes;">&nbsp;</span></span><span lang="AR-SA" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\'; color: black; mso-color-alt: windowtext;">شكراً لثقتك بمجموعة أندلسية الطبية</span></p>
//<p class="MsoNormal" dir="RTL" style="margin-bottom: .0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20.0pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
//</td>
//</tr>
//</tbody>
//</table>
//<p class="MsoNormal"><span style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
//<p class="MsoNormal"><span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></p>
//<p class="MsoNormal">&nbsp;</p>',
//            'details'=>NULL,
//            'type'=>'rich_text_box',
//            'order'=>38,
//            'group'=>'Notification'
//        ] );

//        Setting::create( [
//            'key'=>'notification.coordinator_emails',
//            'display_name'=>'coordinator emails',
//            'value'=>'Hjh-OnlineConfirmation@andalusiagroup.net',
//            'details' => "{\"validation\":{\"rule\":\"emails\"}}",
//            'type'=>'text_area',
//            'order'=>41,
//            'group'=>'Notification'
//        ] );

//        Setting::create( [
////            'key'=>'sms.user_new',
////            'display_name'=>'new user',
////            'value'=>'لقد تمت عملية التسجيل في حي الجامعة بنجاح',
////            'details'=>NULL,
////            'type'=>'text_area',
////            'order'=>41,
////            'group'=>'sms'
////        ] );

//        Setting::create( [
//            'key'=>'sms.coordinator_phones',
//            'display_name'=>'coordinator phones',
//            'value'=>'966560779354',
//            'details' => "{\"validation\":{\"rule\":\"phones\"}}",
//            'type'=>'text_area',
//            'order'=>45,
//            'group'=>'sms'
//        ] );
    }
}
