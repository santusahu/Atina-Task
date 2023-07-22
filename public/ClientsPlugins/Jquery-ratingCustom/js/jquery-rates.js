(function ($) {
  $.fn.rates = function (options) {
    // Default settings for the plugin if none are provided by the user
    const settings = $.extend({
      shadeColor: 'rates-active',
      shadeColor: 'rates-booking',
      shadeColor: 'rates-shootquality',
      shadeColor: 'rates-customersuppot',
      shadeColor: 'rates-price',
      shadeColor: 'rates-editingquality',
      shadeColor: 'rates-submission',
      shapeCount: 5,
      shape: 'white-heart',
      imagesFolderLocation: '',

    }, options);

    return this.each(function () {
      const container = this;
      $(container).addClass('rates-container');
      const $containerName = $(this).attr('id');

      const score = {
        value: 0,
      };

      createStars(settings.shapeCount);

      const $eachStar = $(this).find('i');

      // Colors in the rating shape on hover
      // Removes the color from above the selected rating on mouse out
      $(this).find('i').hover(function () {
        const starIndex = $eachStar.index(this);
        colorShapesToIndex(starIndex);
      }, () => {
        colorShapesToScore();
      });

      // Sets the score rating based on which rating shape was clicked
      $(this).find('i').on('click', function () {
        const starIndex = $eachStar.index(this);
        colorShapesToIndex(starIndex);
        score.value = starIndex + 1;
        $(`#${$containerName}Rating`).val(score.value);
      });

      // Dynamically creates the html markup based on the number of stars indicated
      function createStars() {
        const starInput = $(`<input type="hidden" id = "${$containerName}Rating" name="${$containerName}Rating" value="0" readonly>`);
        $(container).append(starInput);
        const $imageStar = $(`
            <i class="star fa fa-heart-o" data-message="Bad :"></i>
            <i class="star fa fa-heart-o" data-message="Poor :"></i>
            <i class="star fa fa-heart-o" data-message="Average :"></i>
            <i class="star fa fa-heart-o" data-message="Great :"></i>
            <i class="star fa fa-heart-o" data-message="Excellent :"></i>
        `);
        $(container).append($imageStar);
        $('i.star').click(function(){
          var msg = $(this).attr('data-message');
          $(this).parents('.custom-rate').children('.msg-text').html(msg);
          starInput.attr('type', 'text');
          $('.custom-review').addClass('rate-open');
          $(this).parents('.custom-overall-rating').addClass('rating-badge-open');
        });
        // for (let i = 0; i < count; i++) {
        //   const $imageStar = $('<i class="star fa fa-heart-o">');
        //   $(container).append($imageStar);
        // }
      }



      // Resets the shading class on the shapes to color only those up until a designated index
      function colorShapesToIndex(starIndexValue) {
        $eachStar.removeClass(settings.shadeColor);
        for (let i = 0; i <= starIndexValue; i++) {
          const star = $eachStar.get(i);
          $(star).toggleClass(settings.shadeColor);
        }
      }

      // Resets the shading class on the shapes to color only those up to and including the selected score
      function colorShapesToScore() {
        $eachStar.removeClass(settings.shadeColor);
        for (let j = 0; j < score.value; j++) {
          const star = $eachStar.get(j);
          $(star).toggleClass(settings.shadeColor);
        }
      }
    });
  };
}(jQuery));
