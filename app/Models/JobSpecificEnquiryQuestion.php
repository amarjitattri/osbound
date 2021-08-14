<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSpecificEnquiryQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
                            'job_id',
                            'item_fixed',
                            'item_fixed_text',
                            'sheen_level',
                            'sheen_level_text',
                            'condition_substrate',
                            'condition_substrate_text',
                            'require_fitting_items',
                            'require_fitting_items_text',
                            'substrate_contact_area',
                            'substrate_contact_area_text',
                            'colour_choices',
                            'colour_choices_text',
                            'contours_substrate_exposed',
                            'contours_substrate_exposed_text',
                            'samples',
                            'samples_text',
                        ];
}
