let ckbox= document.getElementById("ckCallMe")
let ph= document.getElementById("ph_area")

ckbox.addEventListener('change', (event) => {
    if (event.currentTarget.checked) {    
      ph.classList.remove('hidden')
      ph.required=true
    } else {   
      ph.classList.add('hidden')
      ph.required=false
    }
  })
  
  ph.addEventListener('input', function (e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
  });