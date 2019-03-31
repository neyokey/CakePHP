<section class="well well__offset-3">
    <div class="container">
        <h2><?= __('Our Contacts') ?></h2>
        <div class="map">
          <div id="google-map" class="map_model"></div>
          <ul class="map_locations">
            <li data-x="10.738052" data-y="106.677916">
              <p> Trường STU </p>
            </li>
          </ul>
        </div>
        <div class="row box-3">
            <div class="grid_5">
                <h2><?= __('Contacts Form') ?></h2>
                <?= $this->Form->create($message, ['class' => 'contact-form','id' => 'contact-form1', 'enctype' => 'multipart/form-data' ,'type' => 'file','url' => '/home/contact']) ?>
                <div class="contact-form-loader"></div>
                <fieldset>
                    <label class="name">
                        <?= __('Your Name:') ?>
                        <input type="text" name="name" placeholder="" value="" data-constraints="@Required @Email"/>                
                    </label>
                    <label class="email">
                        <?= __('Your E-mail:') ?>
                        <?php
                            echo $this->Form->control('email', ['type'=>"text", 'placeholder' => '', 'label' => false]);
                        ?> 
                    </label>
                    <label class="subject">
                        <?= __('Subject:') ?>
                        <input type="text" name="subject" placeholder="" value="" data-constraints="@Required @Subject"/>                
                    </label>
                    <label class="message">
                        <?= __('Message:') ?>
                        <?php
                            echo $this->Form->control('message', ['class' => 'textarea_editor', 'placeholder' => '', 'label' => false]);
                        ?>   
                    </label>
                    <div class="btn-wr">
                        <?= $this->Form->button(__('Send'), ['class' => 'g-recaptcha btn btn-danger','data-sitekey' => "6Lfk8mYUAAAAAI677Xl8GL-OdOci46F34sGO1aFM",'data-callback' => "onSubmit" , 'id' => 'btnSubmit']) ?> 
                    </div>
                </fieldset>
            <?= $this->Form->end() ?>
            </div>    
            <div class="preffix_1 grid_6">
                <h2><?= __('Contacts Information') ?></h2>
                <address class="address-2">
                    <div>
                        <dt><?= __('Address:') ?></dt> <dd><?php echo $lienhe['address'];?></dd><br>
                        <dt><?= __('Telphone:') ?></dt> <dd><?php echo $lienhe['phone'];?></dd><br>
                        <dt><?= __('E-mail:') ?></dt> <dd><?php echo $lienhe['email'];?></dd>
                    </div>                        
                </address>
            </div>
        </div>
    </div>
</section>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeuJZ0J8yco3FGPLhFRE6BaoofXkyq9Z8"></script>
<script type="text/javascript">
    function onSubmit(token) {
        $('#contact-form1').submit();
   }
;
(function ($) {
    document.getElementById("btnSubmit").disabled = true;
     
    var o = document.getElementById("google-map");
    if (o) {
        $(document).ready(function () {
            var def_settings = {
                cntClass: 'map',
                mapClass: 'map_model',
                locationsClass: 'map_locations',
                marker: {
                    basic: 'images/gmap_marker.png',
                    active: 'images/gmap_marker_active.png'
                },
                styles: []
            },

            defaults = {
                map: {
                    x: <?php echo $lienhe['X'];?>,
                    y: <?php echo $lienhe['Y'];?>, 
                    zoom: 18
                },
                locations: []
            };
            var getLocations = function ($map, settings) {
            var $locations = $map.parent().find('.' + settings.locationsClass).find('li');

            var locations = [];


            if ($locations.length > 0) {
                $locations.each(function (i) {
                    var $loc = $(this);

                    if ($loc.data('x') && $loc.data('y')) {
                        locations[i] = {
                            x: $loc.data('x'),
                            y: $loc.data('y'),
                            basic: $loc.data('basic') ? $loc.data('basic') : settings.marker.basic,
                            active: $loc.data('active') ? $loc.data('active') : settings.marker.active
                        }

                        if (!$.trim($loc.html())) {
                            locations[i].content = false;
                        } else {
                            locations[i].content = '<div class="iw-content">' + $loc.html() + '</div>';
                        }
                    }
                });
            }
            return locations;
        }

        $.fn.googleMap = function (settings) {

            settings = $.extend(true, {}, def_settings, settings);

            $(this).each(function () {
                var $this = $(this);

                var options = $.extend(
                    true, {}, defaults,
                    {
                        map: {
                            x: $this.data('x'),
                            y: $this.data('y'),
                            zoom: $this.data('zoom')
                        },
                        locations: getLocations($this, settings)
                    }
                );

                var map = new google.maps.Map(this, {
                        center: new google.maps.LatLng(
                            parseFloat(options.map.y),
                            parseFloat(options.map.x)
                        ),
                        scrollwheel: false,
                        styles: settings.styles,
                        zoom: options.map.zoom
                    }),
                    infowindow = new google.maps.InfoWindow(),
                    markers = [];

                for (var i in options.locations) {
                    markers[i] = new google.maps.Marker(
                        {
                            position: new google.maps.LatLng(
                                parseFloat(options.locations[i].y),
                                parseFloat(options.locations[i].x)),
                            map: map,
                            icon: options.locations[i].basic,
                            index: i
                        }
                    );


                    if (options.locations[i].content) {
                        google.maps.event.addListener(markers[i], 'click', function () {
                            for (var j in markers) {
                                markers[j].setIcon(options.locations[j].basic);
                            }

                            infowindow.setContent(options.locations[this.index].content);
                            infowindow.open(map, this);
                            $('.gm-style-iw').parent().parent().addClass("gm-wrapper");
                            this.setIcon(options.locations[this.index].active);
                        });
                        google.maps.event.addListener(infowindow, 'closeclick', function () {
                            for (var j in markers) {
                                markers[j].setIcon(options.locations[j].basic);
                            }
                        });
                    }
                }

                google.maps.event.addDomListener(window, 'resize', function() {
                    map.setCenter(new google.maps.LatLng(
                        parseFloat(options.map.y),
                        parseFloat(options.map.x)
                    ));
                });
            });
        };
        var o = $('#google-map');
            if (o.length > 0){
                o.googleMap({
                    styles: []
                });
            }
        });
    }
})
(jQuery);
</script>