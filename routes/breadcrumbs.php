<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\User;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use App\Models\College;
use App\Models\Semester;
use App\Models\ClassGroup;
use App\Models\TimetableCourse;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('home'));
});

// User > Timetable
Breadcrumbs::for('user_timetable', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Timetable');
});


// COLLEGE
    // Home > College
    Breadcrumbs::for('colleges', function (BreadcrumbTrail $trail) {
        $trail->parent('home');
        $trail->push('College', route('colleges'));
    });
    // Home > College > [College]
    Breadcrumbs::for('college', function (BreadcrumbTrail $trail, College $college) {
        $trail->parent('home');
        $trail->push('Colleges', route('colleges'));
        $trail->push($college->name, route('show_college', $college));
    });


// CLASSGROUPS
    // Home > Classgroups
    Breadcrumbs::for('classgroups', function (BreadcrumbTrail $trail) {
        $trail->parent('home');
        $trail->push('Classgroup', route('classgroups'));
    });

    // Home > Classgroup > [Classgroup]
    Breadcrumbs::for('classgroup', function (BreadcrumbTrail $trail, ClassGroup $classgroup) {
        $trail->parent('home');
        $trail->push('Classgroups', route('classgroups'));
        $trail->push($classgroup->name, route('show_classgroup', $classgroup));
    });
    
    // Home > Classgroup > [Classgroup] > Timetable
    Breadcrumbs::for('classgroup_edit_timetable', function (BreadcrumbTrail $trail, ClassGroup $classgroup, TimetableCourse $timetable_course) {
        $trail->parent('home');
        $trail->push('Classgroups', route('classgroups'));
        $trail->push($classgroup->name, route('show_classgroup', $classgroup));
        $trail->push($timetable_course->id, route('edit_timetable_course', [$classgroup, $timetable_course]));
    });










// // Home > Blog
// Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });