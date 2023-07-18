    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" ><?php echo "ยินดีต้อนรับคุณ ". $_SESSION["name"]; ?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">เมนู</li>
                    <li>
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>หน้าแรก</span>
                        </a>
                    </li>
                    <li>
                        <a href="departmentList.php">
                        <i class="material-icons">
                        store_mall_directory
                        </i>
                            <span>แผนก</span>
                        </a>
                    </li>
                    <li>
                        <a href="personalList.php">
                        <i class="material-icons">
                        person_pin
                        </i>
                            <span>บุคลากร</span>
                        </a>
                    </li>
                    <li>
                        <a href="projectList.php">
                        <i class="material-icons">
                        list
                        </i>
                            <span>โครงการและงาน</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">aj.yamonchanok kitsahawong
                    &copy;  <a href="javascript:void(0);">Dynamic Web Programming</a>.
                </div>
                <div class="version">
                  
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar --> 
    </section>
    