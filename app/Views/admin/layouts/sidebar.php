<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="/admin" data-active="<?= (current_url() == base_url("admin") ? "true" : "false") ?>" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#images" data-toggle="collapse" data-active="<?= (strpos(current_url(), "image") ? "true" : "false") ?>" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <polyline points="21 15 16 10 5 21"></polyline>
                        </svg>
                        <span>Images</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled <?= (strpos(current_url(), "image") ? "show" : "") ?>" id="images" data-parent="#accordionExample">
                    <li class="<?= (strpos(current_url(), "image-gallery") ? "active" : "") ?>">
                        <a href="<?= base_url("admin/image-gallery") ?>"> Gallery </a>
                    </li>
                    <li class="<?= (strpos(current_url(), "board-of-directors") ? "active" : "") ?>">
                        <a href="<?= base_url("admin/board-of-directors") ?>"> Board Of Directors </a>
                    </li>
                    <li class="<?= (strpos(current_url(), "image-publish") ? "active" : "") ?>">
                        <a href="<?= base_url("admin/image-publish") ?>"> Publish </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#table" data-toggle="collapse" data-active="<?= (strpos(current_url(), "table") ? "true" : "false") ?>" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                        <span>Tables</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled <?= (strpos(current_url(), "table") ? "show" : "") ?>" id="table" data-parent="#accordionExample">
                    <li class="<?= (strpos(current_url(), "table-blog") ? "active" : "") ?>">
                        <a href="<?= base_url("admin/table-blog") ?>"> Blog</a>
                    </li>
                    <li class="<?= (strpos(current_url(), "our-bussiness") ? "active" : "") ?>">
                        <a href="<?= base_url("admin/table-our-business") ?>"> Our Business </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="#pages" data-toggle="collapse" data-active="<?= (strpos(current_url(), "pages") ? "true" : "false") ?>" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <?= view("admin/svg/pages.svg") ?>
                        <span>Pages</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled <?= (strpos(current_url(), "setting") ? "show" : "") ?>" id="pages" data-parent="#accordionExample">
                    <li class="<?= (strpos(current_url(), "setting-pages") ? "active" : "") ?>">
                        <a href="<?= base_url("admin/setting-pages") ?>"> Pages </a>
                    </li>
                    <li class="<?= (strpos(current_url(), "setting-info") ? "active" : "") ?>">
                        <a href="<?= base_url("admin/setting-info") ?>"> Info </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="#setting" data-toggle="collapse" data-active="<?= (strpos(current_url(), "setting") ? "true" : "false") ?>" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <?= view("admin/svg/gear.svg") ?>
                        <span>Setting</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled <?= (strpos(current_url(), "setting") ? "show" : "") ?>" id="setting" data-parent="#accordionExample">
                    <li class="<?= (strpos(current_url(), "setting-pages") ? "active" : "") ?>">
                        <a href="<?= base_url("admin/setting-pages") ?>"> Pages </a>
                    </li>
                    <li class="<?= (strpos(current_url(), "setting-info") ? "active" : "") ?>">
                        <a href="<?= base_url("admin/setting-info") ?>"> Info </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- <div class="shadow-bottom"></div> -->
    </nav>

</div>
<!--  END SIDEBAR  -->