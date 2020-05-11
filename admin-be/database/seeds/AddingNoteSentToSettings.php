<?php

use Illuminate\Database\Seeder;
use App\Setting;

class AddingNoteSentToSettings extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Setting::create( [
            'key'=>'notification.note_sent',
            'display_name'=>'Rx Sent',
            'value'=>'<p>&nbsp;</p>
<table class="MsoTableGrid" style="margin-left: 28.5pt; border-collapse: collapse; border: none;" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr style="height: 16.85pt;">
<td style="width: 79.25pt; border: 1pt solid windowtext; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">Email Topic</span></strong></p>
</td>
<td style="width: 331.7pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">الوصفة الطبية في خدمة أندلسية</span><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">&nbsp;DotCare</span></p>
</td>
</tr>
<tr style="height: 16.85pt;">
<td style="width: 79.25pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; background: #9cc2e5; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="106">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><span style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal;" align="center"><strong><span style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">Rx Sent</span></strong></p>
</td>
<td style="width: 331.7pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; padding: 0in 5.4pt; height: 16.85pt;" valign="top" width="442">
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">عزيزي سيد\[[user_name]]</span></p>
<p class="MsoNormal" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal;" align="right"><span dir="RTL" lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 26.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0;">هذه الوصفة الطبية الخاص بك </span></strong><strong><span lang="AR-EG" style="font-size: 26.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0; mso-bidi-language: AR-EG;">بنجاح</span></strong></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">الأسم:[[user_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;"><span style="font-size: 26.6667px;">رقم الهاتف:[[user_phone]]</span></span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">البريد الألكتروني: [[user_email]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">أسم الطبيب: [[doctor_name]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">&nbsp;وقت الحجز: [[Appointment_start]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: right; line-height: normal; direction: rtl; unicode-bidi: embed;"><span lang="AR-EG" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: black;">مدة الحجز: [[Appointment_duration]]</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20pt; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-SA" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0;">ليس لديك مواعيد في خدمة الــ</span></strong><strong><span dir="LTR" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0;">DotCare</span></strong></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-EG" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; mso-bidi-language: AR-EG;">للتواصل مع طبيب مختص أوحجز استشارة منزلية</span></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><strong><span lang="AR-EG" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: #7030a0; mso-bidi-language: AR-EG;">أضغط هنا</span></strong></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><a href="https://page.andalusiahjh.com/home-care-go"><span dir="LTR">https://page.andalusiahjh.com/home-care-go</span></a></p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center">&nbsp;</p>
<p class="MsoNormal" dir="RTL" style="text-align: center; direction: rtl; unicode-bidi: embed;" align="center"><span lang="AR-SA" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\'; color: red;">&nbsp;</span><span lang="AR-SA" style="font-size: 20.0pt; line-height: 107%; font-family: \'Arabic Typesetting\';">شكراً لثقتك بمستشفيات أندلسية</span></p>
<p class="MsoNormal" dir="RTL" style="margin-bottom: 0.0001pt; text-align: center; line-height: normal; direction: rtl; unicode-bidi: embed;" align="center"><span dir="LTR" style="font-size: 20pt; font-family: \'Arabic Typesetting\';">&nbsp;</span></p>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>',
            'details'=>NULL,
            'type'=>'rich_text_box',
            'order'=>41,
            'group'=>'Notification'
        ] );
    }
}
