$(document).ready(function() {
    
    swapHeaderDropdownMenu();
    swapWidget();
    swapProgressBar();
    swapNumericLable();
    
});

function swapHeaderDropdownMenu(){
    var dropdownMenu = $('.dropdown-menu.dropdown-menu-right.animated.zoomIn');
    dropdownMenu.removeClass('dropdown-menu-right');
    dropdownMenu.addClass('dropdown-menu-left');
}

function swapWidget(){
    var widgetIcon = $('.media-left.meida.media-middle');
    widgetIcon.removeClass('media-left');
    widgetIcon.addClass('media-right');

    var widgetText = $('.media-body.media-text-right');
    widgetText.removeClass('media-text-right');
    widgetText.addClass('media-text-left');
}

function swapProgressBar(){
    var progressSubject = $('.pull-left.progress-subject');
    progressSubject.removeClass('pull-left');
    progressSubject.addClass('pull-right');

    var progressPercentage = $('.pull-right.progress-percentage');
    progressPercentage.removeClass('pull-right');
    progressPercentage.addClass('pull-left');
}

function swapNumericLable(){
    var numericLable = $('.label.label-rouded.label-primary.pull-right');
    numericLable.removeClass('pull-right');
    numericLable.addClass('pull-left');
}