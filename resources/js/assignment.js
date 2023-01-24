
        $('select[multiple]').multiselect({
          columns: 2,
          placeholder: 'Select options',
          onChange: function(element, checked) {
            var options = $('#mySelect option:selected');
            var selected = [];
            $(options).each(function(index, brand){
                selected.push($(this).val());
            });
            $('#demo').text("You selected: " + selected.join(','));
          }
        });

        $('#demo').text("You selected: "+$('#mySelect').val());// to show the selected on page load
