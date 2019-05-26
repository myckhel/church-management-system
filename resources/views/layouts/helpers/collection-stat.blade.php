<script>
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

var manual_analysis_hd = (data) => {
  let collection = data.data
  let middle = '';
  nameTotal = []
  let total = 0;
  data.c_types.forEach((i, v) => {
    let name = i.name;
    collection.forEach((c) => {
      nameTotal[name] = (parseInt(nameTotal[name]) + parseInt(c[name])) || parseInt(c[name])
      total +=  parseInt(c[name])
      })
      middle += '<div  id="'+name+'" class="col-xs-2 small adaptive-color" style="">'+name+': '+numberWithCommas(parseInt(nameTotal[name]) || 0)+'</div>';
    })
  return `
  <marquee>
  <div id="manual-analysis-hd" class="panel-heading bg-primary">
    <div class="col-xs-12 text-center">
      <div class="col-xs-12 panel-title">
        <div  id="specifier" class="col-xs-2 small adaptive-color" style="">Within Last ${data.interval} ${data.group}s  </div>
        ${middle}
        <div  id="total" class="col-xs-2 small adaptive-color" style="">Total: ${numberWithCommas(total)}</div>
      </div>
    </div>
  </div>
  </marquee>
  `
}
var group = 'month';
var show = false;
var interval = 8
var switchSelect = (to) => {
  let rangeMin = 1; let rangeMax = 7
  if(to == 1){  group = 'day';    rangeMin = 1; rangeMax = 7  }
  if(to == 3){   group = 'month';  rangeMin = 1; rangeMax = 12  }
  if(to == 2){  group = 'week';    rangeMin = 10; rangeMax = 30 }
  if(to == 4){  group = 'year';    rangeMin = 1; rangeMax = 10  }
  $('#m-i').html($('<option>'
  , { value: 0,
      text : 'Choose range',
      selected: 'selected',
      disabled: true,
  }, '</option>'
  ))
  for(let i = rangeMin; i < rangeMax+rangeMin; i = i + rangeMin){
    $('#m-i').append($('<option>'
    , { value: i,
        text : `Last ${i} ${group}s`,
    }, '</option>'
    ));
    $('#m-i').selectpicker('refresh');
  }
}

// Create a function that will handle AJAX requests
function requestData(days, chart, group, fn){
  interval = days
  $.ajax({
    type: "GET",
    dataType: 'json',
    url: "{{route('apis')}}", // This is the URL to the API
    data: { interval: days, group, show: show }
  })
  .done(function( data ) {
    let dataKey = <?php echo json_encode($c_types) ?>;
    // When the response to the AJAX request comes back render the chart with new data
    $('#manual-analysis-hd').html(manual_analysis_hd({group, interval: days, data, c_types: <?php echo json_encode($c_types); ?>}))
    let calcData = {}
    let total = 0;
    // initialize calcData
    dataKey.map((v) => { calcData[v.name] = 0} )
    data.map((v) => {
      dataKey.map((col) => { calcData[col.name] += v[col.name]; total += v[col.name] })
    })
    dataKey.map((v) => {
      $(`#collection-${v.name}`).html(numberWithCommas(calcData[v.name]))
    })
    $("#collection-total").html(numberWithCommas(total))
    chart.setData(data);
  })
  .fail(function() {
    // If there is no communication between the server, show an error
    alert( "error occured" );
  });
}

$(document).ready(() => {
  var chart = Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'stats-container',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'y', // Set the key for X-axis
    ykeys: [<?php yKeys2($c_types); ?>],
    labels: [<?php labels($c_types); ?>],
    hideHover: 'auto',
    xLabelAngle:25,
    barColors: [<?php barColors($colors); ?>],
  });

  // Request initial data for the past 7 days:
  requestData(interval, chart, group);

  $('ul.ranges a').click(function(e){
    e.preventDefault();

    // Get the number of days from the data attribute
    var el = $(this);
    // remove classes from all
    $('ul li').not(this).removeClass('active');
    $(el).parent().toggleClass('active');
    days = el.attr('data-range');

    // Request the data and render the chart using our handy function
    requestData(days, chart, group);
  })

  $('#m-i').change((e) => {
    var el = e.target;
    requestData(el.value, chart, group);
  })

  $('#show').change((e) => {
    show = e.target.value
    requestData(8, chart, group);
  })

  $('#group').change((e) => {
    let value = e.target.value;
    switchSelect(value)
    // group = value
    // requestData(el.value, chart, group);
  })
})
</script>
