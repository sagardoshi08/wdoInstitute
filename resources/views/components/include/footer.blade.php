</div>
    </main>
    </body>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js"></script>
<script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
<script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/smooth-scrollbar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    // var timeoutTimer;
    //     // 5 min = 150*60*30;
    //     //10 min = 300*60*30;

    // var expireTime = 900*60*900;
    // function expireSession(){
    //     clearTimeout(timeoutTimer);
    //     timeoutTimer = setTimeout("IdleTimeout()", expireTime);
    // }
    // function IdleTimeout() {
    //     localStorage.setItem("logoutMessage", true);
    //     window.location.href="{{url('attendence-logout')}}";
    // }
    // $(document).on('click mousemove scroll', function() {
    //     expireSession();
    // });
    // expireSession();
    window.onload = function(){

$(function(){
//   $('#datepicker').datepicker();
});
};

//  script for quantity starts

$(document).on('click', '.qty-plus', function () {
 $(this).prev().val(+$(this).prev().val() + 1);
});
$(document).on('click', '.qty-minus', function () {
 if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
});

//  script for quantity ends


class Countdown {
constructor(el){
  this.el = el;
  this.targetDate = new Date(el.getAttribute("date-time"));
  this.createCountDownParts()
  this.countdownFunction();
  this.countdownLoopId = setInterval(this.countdownFunction.bind(this), 1000)
}
createCountDownParts(){
  ["d", "h", "m", "s"].forEach(part => {
    const partEl = document.createElement("div");
    partEl.classList.add("part", part);
    const textEl = document.createElement("div");
    textEl.classList.add("text");
    textEl.innerText = part;
    const numberEl = document.createElement("div");
    numberEl.classList.add("number");
    numberEl.innerText = 0;
    partEl.append(numberEl, textEl);
    this.el.append(partEl);
    this[part] = numberEl;
  })
}

countdownFunction(){
  const currentDate = new Date();
  if(currentDate > this.targetDate) return clearInterval(this.intervalId);
  const remaining = this.getRemaining(this.targetDate, currentDate);
  Object.entries(remaining).forEach(([part,value]) => {
    this[part].style.setProperty("--value", value)
    this[part].innerText = value
  })
}

getRemaining(target, now){
  let s = Math.floor((target - (now))/1000);
  let m = Math.floor(s/60);
  let h = Math.floor(m/60);
  let d = Math.floor(h/24);
  h = h-(d*24);
  m = m-(d*24*60)-(h*60);
  s = s-(d*24*60*60)-(h*60*60)-(m*60);
  return { d, h, m, s }
}

}
const countdownEls= document.querySelectorAll(".countdown") || [];
countdownEls.forEach(countdownEl => new Countdown(countdownEl))
@if(Request::segment(1)=="sign-in")
    var x = document.getElementById("location_error");
    function getLocation() {
        debugger
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
    getLocation()
    function showPosition(position) {
        var lat = position.coords.latitude;
        var long = position.coords.longitude;
    }
@endif

@if(Auth::check())
/*for track attendence working hours*/
    var attendence_timeoutTimer;
        // 5 min = 150*60*30;
        //10 min = 300*60*30;

    var attendence_expireTime = 90*60*30;
    function attendence_expireSession(){
        clearTimeout(attendence_timeoutTimer);
        attendence_timeoutTimer = setTimeout("attendence_IdleTimeout()", attendence_expireTime);
    }
    function attendence_IdleTimeout() {
        localStorage.setItem("attendence_logoutMessage", true);
        window.location.href="{{url('attendence-logout')}}";
    }
    $(document).on('click mousemove scroll', function() {
        attendence_expireSession();
    });
    attendence_expireSession();
/*end track attendence working hours*/
@endif
</script>
