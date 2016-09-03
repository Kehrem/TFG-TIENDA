<div id="twitterTimeLine-timelineEjemplo"></div><script>
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
}
(document, "script", "twitter-wjs"));


twttr.ready(function(){
    twttr.widgets.createTimeline({
      sourceType: "profile",
      screenName: "UA_Universidad"
    },
    document.getElementById("twitterTimeLine-timelineEjemplo"),
    {
      width: 500,
      height: 750,
      related: "UA_Universidad"
    }).then(function (el) {
    });
});
</script>