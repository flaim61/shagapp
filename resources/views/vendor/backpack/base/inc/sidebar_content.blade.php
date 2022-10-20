{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-users"></i> Пользователи</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="nav-icon la la-database"></i> Категории</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('product') }}"><i class="nav-icon la la-shopping-cart"></i> Продукты</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('order') }}"><i class="nav-icon la la-cart-plus"></i> Заказы</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('order-statuses') }}"><i class="nav-icon la la-check-circle-o"></i> Статусы заказов</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('post') }}"><i class="nav-icon la la-file-powerpoint-o"></i> Посты</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('review') }}"><i class="nav-icon la la-comment"></i> Reviews</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('contact-link') }}"><i class="nav-icon la la-link"></i> Ссылки</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('contact-link-types') }}"><i class="nav-icon la la-list"></i> Типы ссылок</a></li>