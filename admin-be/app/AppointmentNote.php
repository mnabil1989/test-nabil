<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class AppointmentNote extends Model
{
    protected $fillable=['appointment_id','doctor_id','user_id','note','created_by', 'name', 'description', 'qty'];
    public function doctorId()
    {
        return $this->belongsTo("App\Doctor", 'doctor_id');
    }
    public function userId()
    {
        return $this->belongsTo("App\User", 'user_id');
    }
    public function appointmentId()
    {
        return $this->belongsTo("App\Appointment", 'appointment_id');
    }

    /**
     * replace strings with related attributes.
     *
     * @return string
     */
    public function replace_attributes($setting_key)
    {
        $notes_details = '';
        foreach ($this->appointmentId->appointment_notes as $key => $note)
        {
            $notes_details .= '<tr>';

            $notes_details .= '<td style="padding: 20px 30px 0px; margin: 0px; width: 6.25%;">
<p style="margin: 0px; -moz-text-size-adjust: none; font-size: 18px; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; text-align: left;">'.$note->name.'</p>
</td>';

            $notes_details .= '<td style="padding: 20px 30px 0px; margin: 0px; width: 6.25%;">
<p style="margin: 0px; -moz-text-size-adjust: none; font-size: 18px; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; text-align: left;">'.$note->description.'</p>
</td>';

            $notes_details .= '<td style="padding: 20px 30px 0px; margin: 0px; width: 6.25%;">
<p style="margin: 0px; -moz-text-size-adjust: none; font-size: 18px; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; text-align: left;">'.$note->note.'</p>
</td>';

            $notes_details .= '<td style="padding: 20px 30px 0px; margin: 0px; width: 6.25%;">
<p style="margin: 0px; -moz-text-size-adjust: none; font-size: 18px; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; text-align: left;">'.$note->qty.'</p>
</td>';

            $notes_details .= '</tr>';
        }

        $notes_details = '<table style="height: 216px; border-radius: 4px; background-color: #ffffff; width: 84.9648%; border-style: solid; border-color: #000000;" role="presentation" width="100%" cellspacing="0px" cellpadding="0" bgcolor="#ffffff">
<tbody>
<tr>
<td style="padding: 20px 30px 0px; margin: 0px; width: 6.25%;">
<p style="margin: 0px; -moz-text-size-adjust: none; font-size: 18px; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; text-align: left;"><strong>NAME<br /></strong></p>
</td>
<td style="padding: 20px 30px 0px; margin: 0px; width: 6.25%;">
<p style="margin: 0px; -moz-text-size-adjust: none; font-size: 18px; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; text-align: left;"><strong>DESCRIPTION<br /></strong></p>
</td>
<td style="padding: 20px 30px 0px; margin: 0px; width: 6.25%;">
<p style="margin: 0px; -moz-text-size-adjust: none; font-size: 18px; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; text-align: left;"><strong>NOTES</strong></p>
</td>
<td style="padding: 20px 30px 0px; margin: 0px; width: 6.25%;">
<p style="margin: 0px; -moz-text-size-adjust: none; font-size: 18px; font-family: lato, \'helvetica neue\', helvetica, arial, sans-serif; line-height: 27px; color: #666666; text-align: left;"><strong>QTY<br /></strong></p>
</td>
</tr>.'.$notes_details.'
</tbody>
</table>';

        $string = str_replace('[[user_name]]', $this->userId->name, setting($setting_key));
        $string = str_replace('[[user_email]]', $this->userId->email, $string);
        $string = str_replace('[[user_phone]]', '05'.$this->userId->phone, $string);
        $string = str_replace('[[user_id]]', $this->userId->id, $string);
        $string = str_replace('[[user_gender]]', $this->userId->gender, $string);
        $string = str_replace('[[doctor_name]]', $this->doctorId->title_en, $string);
        $string = str_replace('[[doctor_email]]', $this->doctorId->email, $string);
        $string = str_replace('[[doctor_photo]]',url($this->doctorId->photo), $string);
        $string = str_replace('[[doctor_price]]', $this->doctorId->price, $string);
        $string = str_replace('[[speciality_name]]', $this->doctorId->speciality_rel->name, $string);
        $string = str_replace('[[Appointment_start]]', $this->appointmentId->start, $string);
        $string = str_replace('[[Appointment_duration]]', $this->appointmentId->duration, $string);
        $string = str_replace('[[note]]', $this->note, $string);
        $string = str_replace('[[notes_details]]', $notes_details, $string);
        return $string;
    }
}
