<?php require_once 'inc/top.inc.php'; ?>
<?php require_once 'inc/navbar.inc.php'; ?>

<div class="container-fluid">
    <div class="all-title-box text-center">
        <h1>TABELA VELIČINA</h1>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">POČETNA</a></li>
                <li class="breadcrumb-item active" aria-current = "page"><a href="contact.view.php">VELIČINA</a></li>
            </ul>
        </nav>
    </div>
    <div class="col-md-10 offset-md-1 mt-5 mb-5">
        <h2>Kako odrediti veličinu odeće koju nosite?</h2>
        <p><b>Šta je potrebno?</b></p>
        <ol>
            <li>Kanap</li>
            <li>Lenjir ili metar</li>
        </ol>
        <p><b>Postupak merenja:</b></p>
        <ol>
            <li>Obim grudi: Vodoravno postavite kanap preko najšireg dela grudi. <br>
            Obim struka: Vodoravno postavite kanap preko struka i zategnite ga. <br>
            Obim bokova: Vodoravno postavite kanap preko najšireg dela kukova.</li>
            <li>Vrhovima prstiju uhvatite kanap na mestu gde njegov početak dotiče središnji deo.</li>
            <li>Ne ispuštajući kanap prinestite ga lenjiru i izmerite dužinu.</li>
        </ol>
        <img src="images/odredjivanje-velicine-odece.png" class="img-fluid">
        <br><br>
        <h2>Kako odrediti veličinu obuće koju nosite?</h2>
        <p><b>Šta je potrebno?</b></p>
        <ol>
            <li>Papir veće veličine nego što je stopalo</li>
            <li>Olovka</li>
            <li>Lenjir</li>
        </ol>
        <img src="images/odredjivanje-velicine-obuce.jpg" class="img-fluid">
        <p><b>Postupak merenja:</b></p>
        <ol>
            <li>U sedećem položaju stanite stopalom na papir</li>
            <li>Olovkom pažljivo iscrtajte konturu vašeg stopala</li>
            <li>Lenjirom izmerite dužinu otiska</li>
            <li>Pronađite u tabeli odgovarajuću veličinu za vašu dužinu gazišta</li>
        </ol>

        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#zene">Žene</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#muskarci">Muškarci</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tinejdzerke">Tinejdžerke</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tinejdzeri">Tinejdžeri</a>
            </li>
            <li class="nav-item">
                <a href="#devojcice" class="nav-link" data-toggle="tab">Devojčice</a>
            </li>
            <li class="nav-item">
                <a href="#decaci" class="nav-link" data-toggle="tab">Dečaci</a>
            </li>
            <li class="nav-item">
                <a href="#bebe-devojcice" class="nav-link" data-toggle="tab">Bebe devojčice</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="zene" class="container tab-pane active"><br>
                <h3>ŽENE</h3>
                <img src="images/sizechart-women.png" class="img-fluid">
            </div>
            <div id="muskarci" class="container tab-pane fade"><br>
                <h3>MUŠKARCI</h3>
                <h4 class="text-primary">Men's Size Table (cm)</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Size</th>
                            <th>Chest</th>
                            <th>Waist</th>
                            <th>Hip</th>
                            <th>Inner Leg Length</th>
                        </tr>
                    <tr>
                            <th>XS</th>
                            <td>92</td>
                            <td>86</td>
                            <td>90</td>
                            <td>84</td>
                        </tr>
                        <tr>
                            <th>S</th>
                            <td>96</td>
                            <td>90</td>
                            <td>96</td>
                            <td>84</td>
                        </tr>
                        <tr>
                            <th>M</th>
                            <td>100</td>
                            <td>94</td>
                            <td>102</td>
                            <td>84</td>
                        </tr>
                        <tr>
                            <th>L</th>
                            <td>104</td>
                            <td>98</td>
                            <td>108</td>
                            <td>84</td>
                        </tr>
                        <tr>
                            <th>XL</th>
                            <td>110</td>
                            <td>104</td>
                            <td>114</td>
                            <td>84</td>
                        </tr>
                        <tr>
                            <th>XXL</th>
                            <td>118</td>
                            <td>112</td>
                            <td>120</td>
                            <td>84</td>
                        </tr>
                        <tr>
                            <th>3XL</th>
                            <td>126</td>
                            <td>120</td>
                            <td>126</td>
                            <td>84</td>
                        </tr>
                        <tr>
                            <th>4XL</th>
                            <td>134</td>
                            <td>128</td>
                            <td>132</td>
                            <td>84</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <h4 class="text-primary empty40 pl-15">International Size Conversion</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>TR/EU</th>
                            <th>&nbsp;</th>
                            <th>US</th>
                            <th>IT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>XS</th>
                            <td>46</td>
                            <td>28</td>
                            <td>34</td>
                            <td>44</td>
                        </tr>
                        <tr>
                            <th>S</th>
                            <td>48</td>
                            <td>30</td>
                            <td>36</td>
                            <td>46</td>
                        </tr>
                        <tr>
                            <th>M</th>
                            <td>50</td>
                            <td>32</td>
                            <td>38</td>
                            <td>48</td>
                        </tr>
                        <tr>
                            <th>L</th>
                            <td>52</td>
                            <td>34</td>
                            <td>40</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <th>XL</th>
                            <td>54</td>
                            <td>36</td>
                            <td>42</td>
                            <td>52</td>
                        </tr>
                        <tr>
                            <th>XXL</th>
                            <td>56</td>
                            <td>38</td>
                            <td>44</td>
                            <td>54</td>
                        </tr>
                        <tr>
                            <th>XXXL</th>
                            <td>58</td>
                            <td>40</td>
                            <td>46</td>
                            <td>56</td>
                        </tr>
                        <tr>
                            <th>4XL</th>
                            <td>60</td>
                            <td>42</td>
                            <td>48</td>
                            <td>58</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="tinejdzerke" class="container tab-pane fade"><br>
                <h3>TINEJDŽERKE</h3>
                <img src="images/sizechart-teengirl.png" class="img-fluid">
            </div>
            <div id="tinejdzeri" class="container tab-pane fade"><br>
                <h3>TINEJDŽERI</h3>
                <img src="images/sizechart-teenboy.png" class="img-fluid">
            </div>
            <div id="devojcice" class="container tab-pane fade"><br>
                <h3>DEVOJČICE</h3>
                <img src="images/sizechart-kids-girls.png" class="img-fluid">
            </div>
            <div id="decaci" class="container tab-pane fade"><br>
                <h3>DEČACI</h3>
                <img src="images/sizechart-kids.png" class="img-fluid">
            </div>
            <div id="bebe-devojcice" class="container tab-pane fade"><br>
                <h3>BEBE - DEVOJČICE</h3>
                <img src="images/sizechart-baby.png" class="img-fluid">
            </div>
        </div>
    </div>
        
</div>

<?php require_once 'inc/bottom.inc.php'; ?>