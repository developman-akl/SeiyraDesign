<?php

// use App\Testimonial;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Testimonial;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('slug', 'testimonials');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'testimonials',
                'display_name_singular' => __('Testimonial'),
                'display_name_plural'   => __('Testimonials'),
                'icon'                  => 'voyager-edit',
                'model_name'            => 'TCG\\Voyager\\Models\\Testimonial',
                'policy_name'           => 'TCG\\Voyager\\Policies\\TestimonialPolicy',
                'controller'            => '',
                'generate_permissions'  => '1',
                'description'           => '',
            ])->save();
        }

        //Data Rows
        $testimonialDataType = DataType::where('slug', 'testimonials')->firstOrFail();
        $dataRow = $this->dataRow($testimonialDataType, 'id');
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
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($testimonialDataType, 'name');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.name'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
            ])->save();
        }

        $dataRow = $this->dataRow($testimonialDataType, 'company');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.company'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();
        }

        $dataRow = $this->dataRow($testimonialDataType, 'testimonial');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => __('voyager::seeders.data_rows.testimonial'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 4,
            ])->save();
        }

        $dataRow = $this->dataRow($testimonialDataType, 'image');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => __('voyager::seeders.data_rows.testimonial_image'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'resize' => [
                        'width'  => '150',
                        'height' => 'null',
                    ],
                    'quality'    => '100%',
                    'upsize'     => false,
                    'thumbnails' => [
                        [
                            'name'  => 'medium',
                            'scale' => '50%',
                        ],
                        [
                            'name'  => 'small',
                            'scale' => '25%',
                        ],
                        [
                            'name' => 'cropped',
                            'crop' => [
                                'width'  => '50',
                                'height' => 'null',
                            ],
                        ],
                    ],
                ],
                'order' => 5,
            ])->save();
        }

        $dataRow = $this->dataRow($testimonialDataType, 'link');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.link'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 6,
            ])->save();
        }


        $dataRow = $this->dataRow($testimonialDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('voyager::seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 7,
            ])->save();
        }

        $dataRow = $this->dataRow($testimonialDataType, 'updated_at');
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
                'order'        => 8,
            ])->save();
        }


        // Menu Item
        // $menu = Menu::where('name', 'admin')->firstOrFail();
        // $menuItem = MenuItem::firstOrNew([
        //     'menu_id' => $menu->id,
        //     'title'   => __('voyager::seeders.menu_items.testimonials'),
        //     'url'     => '',
        //     'route'   => 'voyager.testimonials.index',
        // ]);
        // if (!$menuItem->exists) {
        //     $menuItem->fill([
        //         'target'     => '_self',
        //         'icon_class' => 'voyager-edit',
        //         'color'      => null,
        //         'parent_id'  => null,
        //         'order'      => 3,
        //     ])->save();
        // }

        //Permissions
        Permission::generateFor('testimonials');

        // $testimonial = $this->findTestimonial('my-sample-testimonial');
        // if (!$testimonial->exists) {
        //     $testimonial->fill([
        //         'name'          => 'Peter Jackson',
        //         'company'       => '(Cleaner)',
        //         'testimonial'   => '"Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.."',
        //         'image'         => 'testimonials/testimonial2.jpg',
        //     ])->save();
        // }
        
    }

    // /**
    //  * [testimonial description].
    //  *
    //  * @param [type] $slug [description]
    //  *
    //  * @return [type] [description]
    //  */
    // protected function findTestimonial($slug)
    // {
    //     return Testimonial::firstOrNew(['slug' => $slug]);
    // }

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
