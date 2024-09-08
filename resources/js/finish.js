const ready = (callback) => {
    if (document.readyState != "loading") callback()
    else document.addEventListener("DOMContentLoaded", callback)
  }
  
  ready(() => {
   console.log(document.getElementById('review').innerText)
    navigator.clipboard.writeText(document.getElementById('review').innerText)
  })