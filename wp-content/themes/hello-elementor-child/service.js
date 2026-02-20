// (function () {
//   document.addEventListener("DOMContentLoaded", function () {
//     animateDiv(0);
//     animateCircleVisibility(0);
//   });

//   const heroRoundedDivs = document.querySelectorAll(".ripple-circle");
//   const heroCircles = document.querySelectorAll(".hero-div-rounded");

//   let animationTimeout;

//   function animateCircleVisibility(index) {
//     console.log(index);
//     const circle = heroCircles[index];
//     if (index < heroCircles.length) {
//       setTimeout(() => {
//         circle.style.opacity = 1;
//         animateCircleVisibility(index + 1);
//       }, 1000);
//     } else {
//       setTimeout(() => {
//         circle.style.opacity = 0;
//       }, 1000);
//     }
//   }

//   // function animateCircleVisibility(index) {
//   //     console.log(index)
//   //   if (index < heroCircles.length) {
//   //     const circle = heroCircles[index];
//   //     circle.style.opacity = 1;
//   //     setTimeout(() => {
//   //       animateCircleVisibility(index + 1);
//   //     }, 4000);
//   //   }
//   // }

//   function animateDiv(index) {
//     const roundedDiv = heroRoundedDivs[index];
//     roundedDiv.classList.add("ripple");
//     animationTimeout = setTimeout(() => {
//       roundedDiv.classList.remove("ripple");
//       if (index < heroRoundedDivs.length - 1) {
//         animateDiv(index + 1);
//       } else {
//         animateDiv(0);
//       }
//     }, 2500);
//   }

//   function stopAnimation() {
//     clearTimeout(animationTimeout);
//     heroRoundedDivs.forEach((element) => {
//       element.classList.remove("ripple");
//     });
//   }

//   heroRoundedDivs.forEach((heroDiv, index) => {
//     heroDiv.addEventListener("click", () => {
//       stopAnimation();
//       animateDiv(index);
//     });
//   });
// })();
