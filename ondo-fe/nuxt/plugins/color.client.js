// import Vue from 'vue';
//
// export default ({app, route}) => {
//   if (process.client){
//     console.log(route.params.bu);
//     var Color;
//     var hover_color;
//     if (route.params.bu === 'hjh') {
//       Color = '#307AC4';
//       hover_color = '#0db9f2';
//       console.log("hjh " + Color)
//     } else if (route.params.bu === 'apc') {
//       Color = '#c56665';
//       hover_color = '#0d5966';
//       console.log("apc " + Color)
//     }
//     $('.main-nav > li > a').hover(function () {
//       $(this).css({'color': `${Color}`})
//     }, function () {
//       $(this).css({'color': `#000`})
//     });
//     $(".header-login").css({"color": `${Color}`, "border": `2px solid ${Color}`}).hover(function () {
//       $(this).css({'background-color': `${hover_color}`, 'border-color': `${hover_color}`, 'color': '#fff'})
//     }, function () {
//       $(this).css({'background-color': 'transparent', color: `${Color}`, 'border-color': `${Color}`})
//     });
//     $('.bu_lang').css({'background': `${Color}`}).hover(function () {
//       $(this).css({'border': `2px solid ${Color}`, 'background-color': `transparent`, 'color': `${Color} !important`})
//     }, function () {
//       $(this).css({'background-color': `${Color}`, color: `#fff`})
//     });
//
//     $('.btn-primary,.login-btn,.btn-filter,.bu-primary').css({
//       "background-color": `${Color}`,
//       'border': `1px solid ${Color}`
//     }).hover(function () {
//       $(this).css({'background-color': `${hover_color}`, 'border': `1px solid ${hover_color}`})
//     }, function () {
//       $(this).css({'background-color': `${Color}`, 'border': `1px solid transparent`})
//     });
//     $('.login-right .dont-have a').css({color: `${Color}`});
//     $('.footer').css({'background-color': `${Color}`});
//     $('.footer .footer-bottom .copyright').css('border-top', `1px solid ${hover_color}`)
//     $('.login-again,.doc_bu').css({'color': `${Color}`});
//     // $('.bu_icon').css({'border':'5px solid red'})
//     $('.breadcrumb-bar').css('background-color', `${Color}`)
//     $('.btn-filter').css({"background-color": `${Color}`, 'border': `1px solid ${Color}`}).hover(function () {
//       $(this).css({'background-color': `${hover_color}`, 'border': `1px solid ${hover_color}`})
//     }, function () {
//       $(this).css({'background-color': `${Color}`, 'border': `1px solid transparent`})
//     });
//     $(".view-pro-btn").css({ border: `1px solid ${Color}`, color: `${Color}` });
//     $(".view-pro-btn").hover(
//       function() {
//         $(this).css({ "background-color": `${Color}`, color: "#fff" });
//       },
//       function() {
//         $(this).css({ "background-color": "transparent", color: `${Color}` });
//       }
//     );
//     $('a.btn-primary').css({ 'border': `1px solid ${Color}`, 'background-color': `${Color}` })
//     $('.nav-link .active').css({'border-bottom-width': '3px', 'color': `${Color}`})
//     $(".exist-customer a,.terms-accept a,.booking-total ul li .total-cost").css("color", `${Color}`);
//     $('.btn-primary').css('background-color',`${Color}`);
//     $('.bu-marker').css({'color':`${Color} !important`,'border':'2px solid red'})
//     // document.getElementsByClassName('clini-infos ul li').style.color = 'red';
//   }
// }
