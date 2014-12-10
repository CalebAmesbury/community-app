$(document).ready(function(){
  var $container = $('.sort');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false,
        }
    });

    $('.header-wpr ul a').click(function(){
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false,
            }
        });
      return false;
    });

    var $optionSets = $('.header-wpr ul'),
           $optionLinks = $optionSets.find('a');
     
           $optionLinks.click(function(){
              var $this = $(this);
          // don't proceed if already selected
          if ( $this.hasClass('selected') ) {
              return false;
          }
       var $optionSet = $this.parents('.header-wpr ul');
       $optionSet.find('.selected').removeClass('selected');
       $this.addClass('selected'); 
  });
});