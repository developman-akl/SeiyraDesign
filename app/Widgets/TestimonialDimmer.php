<?php

namespace App\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class TestimonialDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Voyager::model('Testimonial')->count();
        $string = trans_choice('voyager::dimmer.testimonial', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-edit',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.testimonial_text', ['count' => $count, 'string' => Str::lower($string)]),
            // 'button' => [
            //     'text' => __('voyager::dimmer.testimonial_link_text'),
            //     'link' => route('voyager.testimonials.index'),
            // ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('Testimonial'));
    }
}
