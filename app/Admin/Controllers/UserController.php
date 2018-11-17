<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->id('Id')->sortable();
        $grid->name('用户名');
        $grid->email('邮箱');
        $grid->password('密码');
        $grid->activation_token('Activation token');
        $grid->activated('激活状态')->display(function ($activated) {
            return $activated ? '是' : '否';
        })->sortable();
        $grid->introduction('个人简介');
        $grid->avatar('头像');
        $grid->qq('QQ');
        $grid->tel('联系电话');
        $grid->stuNum('学号');
        $grid->realname('真实姓名');
        $grid->WCAID('WCA ID')->sortable();
        $grid->remember_token('Remember token');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        $grid->paginate(15);
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->id('Id');
        $show->name('Name');
        $show->email('Email');
        $show->password('Password');
        $show->activation_token('Activation token');
        $show->activated('Activated');
        $show->introduction('Introduction');
        $show->avatar('Avatar');
        $show->qq('Qq');
        $show->tel('Tel');
        $show->stuNum('StuNum');
        $show->realname('Realname');
        $show->WCAID('WCAID');
        $show->remember_token('Remember token');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User);

        $form->text('name', '用户名');
        $form->email('email', '邮箱');
        $form->password('password', '密码');
        $form->text('activation_token', 'Activation token');
        $form->switch('activated', '激活状态');
        $form->text('introduction', '个人简介');
        $form->image('avatar', '头像')->default('http://cubing.jxnu.club/img/avatar/unset.jpg');
        $form->text('qq', 'QQ');
        $form->text('tel', '联系电话');
        $form->text('stuNum', '学号');
        $form->text('realname', '真实姓名');
        $form->text('WCAID', 'WCA ID');
        $form->text('remember_token', 'Remember token');

        return $form;
    }
}
