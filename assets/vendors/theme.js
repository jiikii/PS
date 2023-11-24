"use strict";!function(){if($(".dropdown-menu a.dropdown-toggle").length){document.querySelectorAll(".dropdown-menu a.dropdown-toggle").forEach((function(e){e.addEventListener("click",(function(e){if(!this.nextElementSibling.classList.contains("show")){this.closest(".dropdown-menu").querySelectorAll(".show").forEach((function(e){e.classList.remove("show")}))}this.nextElementSibling.classList.toggle("show");const t=this.closest("li.nav-item.dropdown.show");t&&t.addEventListener("hidden.bs.dropdown",(function(e){document.querySelectorAll(".dropdown-submenu .show").forEach((function(e){e.classList.remove("show")}))})),e.stopPropagation()}))}))}if($('[data-bs-toggle="tooltip"]').length)[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map((function(e){return new bootstrap.Tooltip(e)}));if($('[data-bs-toggle="popover"]').length)[].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map((function(e){return new bootstrap.Popover(e)}));if($("#cardRadioone , #cardRadioTwo").length&&($("#internetpayment").hide(),$("#cardRadioone").on("change",(function(){this.checked&&($("#cardpayment").show(),$("#internetpayment").hide())})),$("#cardRadioTwo").on("change",(function(){this.checked&&($("#internetpayment").show(),$("#cardpayment").hide())}))),$(".password-field input").length){function l(e){var t=0;return e.length>=6&&(t+=1),e.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)&&(t+=1),e.match(/([a-zA-Z])/)&&e.match(/([0-9])/)&&(t+=1),t}$(".password-field input").on("keyup",(function(){var e=l($(this).val()),t=$(this).parent(".password-field");t.removeClass((function(e,t){return(t.match(/\level\S+/g)||[]).join(" ")})),t.addClass("level"+e)}))}if($('[data-upload-id="courseImage"]').length){new FileUploadWithPreview.FileUploadWithPreview("courseImage")}if($("#nav-toggle").length&&$("#nav-toggle").on("click",(function(e){e.preventDefault(),$("#db-wrapper").toggleClass("toggled")})),$("#invoice").length&&$("#invoice").find(".print-link").on("click",(function(){$.print("#invoice")})),$(".sidebar-nav-fixed a").length&&$(".sidebar-nav-fixed a").on("click",(function(e){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var t=$(this.hash);(t=t.length?t:$("[name="+this.hash.slice(1)+"]")).length&&(e.preventDefault(),$("html, body").animate({scrollTop:t.offset().top-90},1e3,(function(){var e=$(t);if(e.focus(),e.is(":focus"))return!1;e.attr("tabindex","-1"),e.focus()})))}$(".sidebar-nav-fixed a").each((function(){$(this).removeClass("active")})),$(this).addClass("active")})),$("#checkAll").length&&$("#checkAll").on("click",(function(){$("input:checkbox").not(this).prop("checked",this.checked)})),$("#btn-icon").length&&$(".btn-icon").on("click",(function(){$(this).parent().addClass("active").siblings().removeClass("active")})),$(".stopevent").length&&$(document).on("click.bs.dropdown.data-api",".stopevent",(function(e){e.stopPropagation()})),$("input[name=tags]").length){var e=document.querySelector("input[name=tags]");new Tagify(e)}if($(".headingTyped").length)new Typed(".headingTyped",{strings:["Skills","Products ","Teams","Future"],typeSpeed:40,backSpeed:40,backDelay:1e3,loop:!0});if($(".needs-validation").length){var t=document.querySelectorAll(".needs-validation");Array.prototype.slice.call(t).forEach((function(e){e.addEventListener("submit",(function(t){e.checkValidity()||(t.preventDefault(),t.stopPropagation()),e.classList.add("was-validated")}),!1)}))}if($(".toast").length)[].slice.call(document.querySelectorAll(".toast")).map((function(e){return new bootstrap.Toast(e)}));if($(".offcanvas").length)[].slice.call(document.querySelectorAll(".offcanvas")).map((function(e){return new bootstrap.Offcanvas(e)}));if($(".dropdown-toggle").length)[].slice.call(document.querySelectorAll(".dropdown-toggle")).map((function(e){return new bootstrap.Dropdown(e)}));if($("#dataTableBasic").length&&$(document).ready((function(){$("#dataTableBasic").DataTable({responsive:!0,pagingType:"numbers"})})),$("#dataTableButtons").length&&$(document).ready((function(){$("#dataTableButtons").DataTable({responsive:!0,dom:"<'row align-items-center'<'col-xl-6 col-12 ps-lg-6 px-4 py-2'B><'col-xl-4 col-12 d-xl-flex justify-content-end'f><'col-xl-2 d-xl-flex justify-content-end'l><'col-sm-12'tr<br/>>><'row align-items-center border-top mx-0'<'col-sm-6'i><'col-sm-6'p>>",buttons:[{text:"colvis",className:"btn btn-light mb-1",init:function(e,t,n){$(t).removeClass("btn-secondary")}},{text:"copyHtml5",className:"btn btn-light mb-1",init:function(e,t,n){$(t).removeClass("btn-secondary")}},{text:"csvHtml5",className:"btn btn-light mb-1",init:function(e,t,n){$(t).removeClass("btn-secondary")}},{text:"pdfHtml5",className:"btn btn-light mb-1",init:function(e,t,n){$(t).removeClass("btn-secondary")}},{text:"print",className:"btn btn-light mb-1",init:function(e,t,n){$(t).removeClass("btn-secondary")}}],pagingType:"numbers"})})),$("#liveAlertPlaceholder").length){var n=document.getElementById("liveAlertPlaceholder"),o=document.getElementById("liveAlertBtn");o&&o.addEventListener("click",(function(){var e,t,o;e="Nice, you triggered this alert message!",t="success",(o=document.createElement("div")).innerHTML='<div class="alert alert-'+t+' alert-dismissible" role="alert">'+e+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>',n.append(o)}))}if($("#typed").length)new Typed("#typed",{stringsElement:"#typed-strings",typeSpeed:40,backSpeed:40,backDelay:1e3,loop:!0});if($("#slider").length){var a=document.getElementById("slider");noUiSlider.create(a,{start:[32],connect:[!0,!1],range:{min:0,max:60},tooltips:[wNumb({decimals:0})]})}if($(".glightboxGallery").length)GLightbox({selector:".glightboxGallery"})}(),function(){if($('.theme-switch input[type="checkbox"]').length){const e=document.querySelector('.theme-switch input[type="checkbox"]'),t=localStorage.getItem("theme");function n(e){e.target.checked?(document.documentElement.setAttribute("data-theme","dark"),localStorage.setItem("theme","dark")):(document.documentElement.setAttribute("data-theme","light"),localStorage.setItem("theme","light"))}t&&(document.documentElement.setAttribute("data-theme",t),"dark"===t&&(e.checked=!0)),e.addEventListener("change",n,!1)}}(),function(){if($("#changelog").length){document.getElementById("changelog").innerHTML="v3.1.0"}}();
