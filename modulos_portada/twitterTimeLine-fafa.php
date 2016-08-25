<div id="twitterTimeLine-fafa"></div><script src="https://platform.twitter.com/widgets.js"></script><script>
window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));
twttr.widgets.createTimeline({
  sourceType: "profile",
  screenName: "fog1furan"
},
document.getElementById("twitterTimeLine-fafa"),
{
  width: 300,
  height: 300,
  related: "fog1furan"
}).then(function (el) {
  console.log("Embedded a timeline.")
});
</script>