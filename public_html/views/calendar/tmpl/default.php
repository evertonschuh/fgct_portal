<?php
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.keepalive');
JHTML::_('behavior.formvalidation');

jimport('joomla.image.resize');
$resize = new JResize();

$config   = JFactory::getConfig();
$siteOffset = $config->getValue('offset');

/*
if ( !empty( $this->item->image_arma )):
    $imageUser = $resize->resize(JPATH_CDN .DS. 'images' .DS. 'armas' .DS. $this->item->image_arma, 100, 100, 'cache/' . $this->item->image_arma, 'manterProporcao');
else:
    $imageUser = $resize->resize(JPATH_IMAGES .DS. 'noimageweapon.png' , 100, 100, 'cache/noimageweapon.png', 'manterProporcao'); 
endif;  
*/ 
?>

<form method="post" name="adminForm" enctype="multipart/form-data" class="form-validate">
    <div class="row">
        <div class="col-12">
            <div class="card app-calendar-wrapper">
                <div class="row g-0">
                    <!-- Calendar Sidebar -->
                    <div class="col-12 col-md-2 app-calendar-sidebar" id="app-calendar-sidebar">

                        <div class="p-4">
                            <!-- inline calendar (flatpicker) -->
                            <!-- Filter -->
                            <div class="mb-4">
                                <small class="text-small text-muted text-uppercase align-middle">Modalidades</small>
                            </div>

                            <div class="form-check mb-2">
                                <input class="form-check-input select-all" type="checkbox" id="selectAll" data-value="all" checked>
                                <label class="form-check-label" for="selectAll">Ver Todas</label>
                            </div>
                            <div class="app-calendar-events-filter">
                                <?php foreach($this->modalidades as $i => $modalidade): ?>
                                <div class="form-check form-check-danger mb-2">
                                    <input class="form-check-input input-filter" type="checkbox" id="select-<?php echo $modalidade->id_modalidade; ?>" data-value="<?php echo $modalidade->id_modalidade; ?>" checked>
                                    <label class="form-check-label" for="select-<?php echo $modalidade->id_modalidade; ?>"><?php echo $modalidade->name_modalidade; ?></label>
                                </div>
                                
                                <?php endforeach ?>

                            </div>
                        </div>
                    </div>
                    <!-- /Calendar Sidebar -->

                    <!-- Calendar & Modal -->
                    <div class="col-12 col-md-10">
                        <div class="col-12 app-calendar-content">
                            <div class="card shadow-none border-0">
                                <div class="card-body pb-0">
                                    <!-- FullCalendar -->
                                    <div id="calendar" class="m-3"></div>
                                </div>
                            </div>
                            <div class="app-overlay"></div>
                            <!-- FullCalendar Offcanvas -->
                            <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="addEventSidebar" aria-labelledby="addEventSidebarLabel">
                                <div class="offcanvas-header border-bottom">
                                    <h5 class="offcanvas-title mb-2" id="addEventSidebarLabel">Add Event</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <form class="event-form pt-0" id="eventForm" onsubmit="return false">
                                        <div class="mb-3">
                                            <label class="form-label" for="eventTitle">Title</label>
                                            <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="Event Title" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="eventLabel">Label</label>
                                            <select class="select2 select-event-label form-select" id="eventLabel" name="eventLabel">
                                                <option data-label="primary" value="Business" selected>Business</option>
                                                <option data-label="danger" value="Personal">Personal</option>
                                                <option data-label="warning" value="Family">Family</option>
                                                <option data-label="success" value="Holiday">Holiday</option>
                                                <option data-label="info" value="ETC">ETC</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="eventStartDate">Start Date</label>
                                            <input type="text" class="form-control" id="eventStartDate" name="eventStartDate" placeholder="Start Date" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="eventEndDate">End Date</label>
                                            <input type="text" class="form-control" id="eventEndDate" name="eventEndDate" placeholder="End Date" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input allDay-switch" />
                                                <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                                </span>
                                                <span class="switch-label">All Day</span>
                                            </label>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="eventURL">Event URL</label>
                                            <input type="url" class="form-control" id="eventURL" name="eventURL" placeholder="https://www.google.com" />
                                        </div>
                                        <div class="mb-3 select2-primary">
                                            <label class="form-label" for="eventGuests">Add Guests</label>
                                            <select class="select2 select-event-guests form-select" id="eventGuests" name="eventGuests" multiple>
                                                <option data-avatar="1.png" value="Jane Foster">Jane Foster</option>
                                                <option data-avatar="3.png" value="Donna Frank">Donna Frank</option>
                                                <option data-avatar="5.png" value="Gabrielle Robertson">Gabrielle Robertson</option>
                                                <option data-avatar="7.png" value="Lori Spears">Lori Spears</option>
                                                <option data-avatar="9.png" value="Sandy Vega">Sandy Vega</option>
                                                <option data-avatar="11.png" value="Cheryl May">Cheryl May</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="eventLocation">Location</label>
                                            <input type="text" class="form-control" id="eventLocation" name="eventLocation" placeholder="Enter Location" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="eventDescription">Description</label>
                                            <textarea class="form-control" name="eventDescription" id="eventDescription"></textarea>
                                        </div>
                                        <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                                            <div>
                                                <button type="submit" class="btn btn-primary btn-add-event me-sm-3 me-1">Add</button>
                                                <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1" data-bs-dismiss="offcanvas">Cancel</button>
                                            </div>
                                            <div>
                                                <button class="btn btn-label-danger btn-delete-event d-none">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Calendar & Modal -->
                </div>
            </div>
        </div>
    </div>   
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="controller" value="calendar" />
    <input type="hidden" name="view" value="calendar" />
    <?php echo JHTML::_('form.token'); ?>
</form>