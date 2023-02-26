<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu for admin-->
    @role('Admin')
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/access/courses" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            {{ __('Courses') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/access/course-assignment" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            {{ __('Lecturer Course') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="/access/lecturers" class="nav-link">
                                <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                <p>Lecturers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/access/students" class="nav-link">
                                <i class="fas fa-user-graduate nav-icon"></i>
                                <p>Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/access/other-users" class="nav-link">
                                <i class="fas  nav-icon"></i>
                                <p>Other Users</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-donate nav-icon"></i>
                        <p>
                            Accounts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="/access/invoices" class="nav-link">
                                <i class="fas fa-file-invoice-dollar nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/access/invoice-student" class="nav-link">
                                <i class="fas fa-user-graduate nav-icon"></i>
                                <p>Invoice & Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/access/receipts" class="nav-link">
                                <i class="fas fa-receipt nav-icon"></i>
                                <p>Receipts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/access/students-balance" class="nav-link">
                                <i class="fas fa-hand-holding-usd nav-icon"></i>
                                <p>Fees Balances</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle nav-icon"></i>
                        <p>
                            Department & Program
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="/access/departments" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Departments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/access/programs" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Programs</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle nav-icon"></i>
                        <p>
                            Academic Years
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="/access/academic-years-list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>School Calendars</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/access/semesters-list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>School Semesters</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    @endrole
    <!-- /.sidebar-menu -->


    <!-- Sidebar Menu for Accounts-->
    @role('Accounts')
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-donate nav-icon"></i>
                        <p>
                            Accounts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="/access/invoices" class="nav-link">
                                <i class="fas fa-file-invoice-dollar nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/access/invoice-student" class="nav-link">
                                <i class="fas fa-user-graduate nav-icon"></i>
                                <p>Invoice & Students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/access/receipts" class="nav-link">
                                <i class="fas fa-receipt nav-icon"></i>
                                <p>Receipts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/access/students-balance" class="nav-link">
                                <i class="fas fa-hand-holding-usd nav-icon"></i>
                                <p>Fees Balances</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle nav-icon"></i>
                        <p>
                            Academic Years
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="/access/academic-years-list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>School Calendars</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/access/semesters-list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>School Semesters</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    @endrole
    <!-- /.sidebar-menu -->

    <!-- Sidebar Menu for student-->
    @role('Student')
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle nav-icon"></i>
                        <p>
                            My Account
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="/student/academic-profile" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Academic Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/student/fees-statement" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Financial Statement</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/student/grades" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Grades</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    @endrole
    <!-- /.sidebar-menu -->

     <!-- Sidebar Menu for Lecture-->
     @role('Lecturer')
     <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <li class="nav-item">
                 <a href="{{ route('home') }}" class="nav-link">
                     <i class="nav-icon fas fa-th"></i>
                     <p>
                         {{ __('Dashboard') }}
                     </p>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="/access/my-courses" class="nav-link">
                     <i class="nav-icon fas fa-book"></i>
                     <p>
                         {{ __('My Courses') }}
                     </p>
                 </a>
             </li>

             

             <li class="nav-item">
                 <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-circle nav-icon"></i>
                     <p>
                         Department & Program
                         <i class="fas fa-angle-left right"></i>
                     </p>
                 </a>
                 <ul class="nav nav-treeview" style="display: none;">
                     <li class="nav-item">
                         <a href="/access/departments" class="nav-link">
                             <i class="far fa-circle nav-icon"></i>
                             <p>Departments</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="/access/programs" class="nav-link">
                             <i class="far fa-circle nav-icon"></i>
                             <p>Programs</p>
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="nav-item">
                 <a href="#" class="nav-link">
                     <i class="nav-icon fas fa-circle nav-icon"></i>
                     <p>
                         Academic Years
                         <i class="fas fa-angle-left right"></i>
                     </p>
                 </a>
                 <ul class="nav nav-treeview" style="display: none;">
                     <li class="nav-item">
                         <a href="/access/academic-years-list" class="nav-link">
                             <i class="far fa-circle nav-icon"></i>
                             <p>School Calendars</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="/access/semesters-list" class="nav-link">
                             <i class="far fa-circle nav-icon"></i>
                             <p>School Semesters</p>
                         </a>
                     </li>
                 </ul>
             </li>
         </ul>
     </nav>
 @endrole
 <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
