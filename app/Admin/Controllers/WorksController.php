<?php

namespace App\Admin\Controllers;

use App\Works;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class WorksController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Works::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->title('标题')->editable();
            $grid->picture('图片')->image();
            $grid->url()->editable();
            $grid->introduce('简介')->editable();
            $grid->hard('技术难点')->editable();

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Works::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('title', '标题')->rules('required');
            $form->url('url');
            $form->text('introduce', '简介')->rules('required');
            $form->text('hard', '技术难点')->rules('required');
            $form->image('picture', '图片');


            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }

}
