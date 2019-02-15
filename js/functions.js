const resetForm = (element) => {
  $(element).trigger("reset");
}

function loadElement(element,bool){
  $(element).prop('disabled', bool);
  let $this = $(element);
  var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i>';
  if (bool) {
    $this.data('original-text', $($this).html());
    $this.html(loadingText);
  }else{
    $this.html($this.data('original-text'))
  }
}

const toggleAble = (element, bool, text) => {
  $(element).prop('disabled', bool);
  let $this = $(element);
  if (bool) {
  	var loadingText = `<i class="fa fa-circle-o-notch fa-spin"></i> ${text || ' loading... '}`;
    $this.data('original-text', $($this).html());
    $this.html(loadingText);
  }else{
    $this.html($this.data('original-text'))
  }
}

const divLoader = () => (
  `<style>
  #circle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
  	width: 150px;
      height: 150px;
  }

  .loader {
      width: calc(100% - 0px);
  	height: calc(100% - 0px);
  	border: 8px solid #162534;
  	border-top: 8px solid #09f;
  	border-radius: 50%;
  	animation: rotate 5s linear infinite;
  }

  @keyframes rotate {
  100% {transform: rotate(360deg);}
  }
  </style>
  <div id="circle">
    <div class="loader">
      <div class="loader">
          <div class="loader">
             <div class="loader">

             </div>
          </div>
      </div>
    </div>
  </div> `
)

const poster = ({url, data, alert, type}, fn) => {
  alert = alert || true
  type = type || 'POST'
  $.ajax({url, data, type})
  .done((res) => {
    if (alert !== 'false') {
      if(res.status){
        swal("Success!", res.text, "success");
      } else {
        swal("Oops", res.text, "error");
      }
    }
    if (typeof(fn) === 'function') {
      fn(res)
    }
  })
  .fail((e) => {
    swal("Oops", "Internal Server Error", "error");
    if (typeof(fn) === 'function') {
      fn(e)
    }
    console.log(e);
  })
}
