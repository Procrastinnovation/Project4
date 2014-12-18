## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


#Project 4:  Clinical Trial demonstrating CRUD 
#By John Lim

#Goal
Object of this project is to use Laravel PHP and demonstrate understanding of MVC and CRUD using mySQL.

#Demo
Jing for Project 4 link: http://www.screencast.com/t/PyuSpp1n1Q

#Note
Clincial Trial are designed to avoid bias therefore, some studies are blinded and some are unblinded. To demonstrate this, I have added permission function to this project and read patient information based on the permission access. Also edit can be only done by Study Coordinator role as only these users should be allowed to see and adjust the treatment and dose. I have set up 2 treatments in this study, DWA and Laravel where both have doses of 50mg, 100mg, 150mg. And Study coordinator can delete record and remove patients from the study. When any patient gets registered into the study, they will get assigned to treatment and drug dose using random number to avoid bias and distribute the dose randomly. However, only user with study coordinator can see this part of information and edit as well.


#Live enviroment
http://p4.projectjohnlim.com/