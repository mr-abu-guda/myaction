
function fix(v){if (!isFinite(v)) return "";if (v == 0) return "0";st = "" + v;epos = st.indexOf('E');if (epos == -1) epos = st.indexOf('e');sdigi = Math.log(Math.abs(v)) / Math.LN10;sdigif = Math.floor(sdigi);if (epos == -1){adjust = Math.pow(10, sdigif-12);faqs = Math.round(v/adjust);norst = ""+faqs;if (sdigif<12){adjust2 = Math.pow(10, 12-sdigif);return (faqs / adjust2);}else return (faqs * adjust);}else {zo = v*Math.pow(10, 12-sdigif);szo = String(Math.round(zo));inse = -1;if (szo.charAt(0) == '-') inse = 2;else inse = 1;rest = szo.substring(inse,szo.length);i = rest.length-1;while (i>=0 && rest.charAt(i) == '0')i--;rest = rest.substring(0,i+1);rou = szo.substring(0,inse);if (rest.length>0) rou += "." + rest;if (sdigif<0) sa = rou + "E";else sa = rou + "E+";snow = sa + sdigif;vanow = Math.abs(parseFloat(snow));faqsvab = Math.abs(v);if (sdigif>=0){if (vanow>5*faqsvab)snow = sa + String(sdigif-1);else if (vanow<faqsvab/5)snow = sa + String(sdigif+1);}else if (sdigif>=0){if (vanow>5*faqsvab)snow = sa + String(sdigif+1);else if (vanow<faqsvab/5)snow= sa + String(sdigif-1);}vanow = parseFloat(snow);if (vanow>1.1*v || vanow<0.9*v) return v;else return snow;}}
function setcookies(){var myform=document.forms['cform'];var d = new Date();d.setFullYear(d.getFullYear()+1);document.cookie='' + module + '_D1=' + myform.D1.selectedIndex + '; expires=' + d.toString() + '; path=/';document.cookie='' + module + '_D2=' + myform.D2.selectedIndex + '; expires=' + d.toString() + '; path=/';document.cookie='' + module + '_T1=' + myform.T1.value + '; expires=' + d.toString() + '; path=/';}
function convert(){{ var myform=document.forms['cform'];w1=myform.D1.options[myform.D1.selectedIndex].value;w2=myform.D2.options[myform.D2.selectedIndex].value;faqsorg=factors[w2]/factors[w1];resfaqs=myform.T1.value*faqsorg;elm=document.getElementById("N1");elm2=document.getElementById("N2");elm.innerHTML=gbrt[w1];elm2.innerHTML=gbrt[w2];if (isNaN(parseFloat(resfaqs)))myform.T2.value="";else{if(document.getElementById("ehseb").href =='http://www.ehseb.com/'){myform.T2.value=fix(parseFloat(resfaqs))+" ";}};setcookies()}}
function convertval(key1, key2, val){}
$(document).ready( function(){ 
$('#form').submit(function(event){update_data();$('html, body').animate({scrollTop: ($("#output"))}, 800);document.activeElement.blur();event.preventDefault();} );
$('#mainbody').on('click',function(){if($('button.navbar-toggle').is(':visible') && $('a.dropdown-toggle').is(':visible')){$('button.navbar-toggle').click();};});
} );
