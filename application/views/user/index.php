<!-- Main content -->
<section class="content">
    <?php if ($user['role_id'] == '3') { ?>
        <?php
        $rsm = $this->db->query("SELECT * FROM at_atk where sts=2 AND is_active=1");
        $nonRsm = $this->db->query("SELECT * FROM at_atk where username='rsm' AND sts=2 AND is_active=1");
        ?>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>150</h3>

                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Bounce Rate</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>44</h3>

                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Unique Visitors</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    <?php } ?>
    <div class="callout callout-info">
        <h4>VISI DAN MISI UMSU</h4>
        <p style="text-align: justify;">Perguruan tinggi pada hakekatnya merupakan lembaga yang berfungsi untuk melestarikan, mengembangkan, menyebarluaskan, dan menggali ilmu pengetahuan dan teknologi. Selain itu perguruan tinggi juga berfungsi mengembangkan kualitas sumberdaya manusia dan menghasilkan jasa-jasa. Dalam era globalisasi, informasi, dan saling ketergantungan sebagaimana yang telah, sedang, dan akan berlangsung, peran perguruan tinggi menjadi semakin penting. Dalam era tersebut keunggulan suatu bangsa tidak lagi ditentukan oleh kekayaan sumberdaya alam yang dimilikinya, tetapi lebih ditentukan oleh kualitas sumberdaya manusia, penguasaan informasi, serta penguasaan ilmu pengetahuan dan teknologi.</p>
        <p style="text-align: justify;">Berkaitan dengan persoalan di atas, eksistensi Universitas Muhammadiyah Sumatera Utara kedepan ditentukan oleh kemampuannya untuk memenuhi tuntutan kebutuhan-kebutuhan tersebut. Untuk memenuhi tuntutan-tuntutan tersebut, Universitas Muhammadiyah Sumatera Utara perlu secara terus-menerus mempertinggi daya saing dan daya juang guna mencapai keunggulan kompetitif berkelanjutan berdasarkan landasan filosofi dan pemikiran di atas, Universitas Muhammadiyah Sumatera Utara merumuskan visi, misi dan tujuan penyelenggaraan dan pengembangan sebagai berikut.</p>

       </div>

    <div class="callout callout-info">
        <h4>Visi</h4>

        <p>Menjadi Perguruan Tinggi yang unggul dalam membangun peradaban bangsa dengan mengembangkan ilmu pengetahuan, teknologi dan Sumber Daya manusia berdasarkan Al-Islam dan Kemuhammadiyahan</p>
    </div>
    <div class="callout callout-info">
        <h4>Misi</h4>

        <p>Untuk mewujudkan visinya, Universitas Muhammadiyah Sumatera Utara memiliki misi sebagai berikut:</p>
<ol>
<li>Menyelenggarakan pendidikan dan pengajaran berdasarkan Al-Islam dan Kemuhammadiyahan.</li>
<li>Menyelenggarakan penelitian, pengembangan ilmu pengetahuan dan teknologi berdasarkan Al-Islam dan Kemuhammadiyahan</li>
<li>Melakukan pengabdian kepada masyarakat melalui pemberdayaan dan pengembangan kehidupan masyarakat berdasarkan Al-Islam dan Kemuhammadiyahan.</li>
</ol>
    </div>

</section>