$(document).ready(function() {

  $("main#spapp > section").height($(document).height() - 60);

  var app = $.spapp({
    pageNotFound : 'error_404'
  }); // initialize

  // define routes
  app.route({
    view: 'about',
    load: "about.html"  
  });
  app.route({
    view: 'faq',
    load: "faq.html"  
  });
  app.route({
    view: 'features',
    load: "features.html"  
  });
  app.route({
    view: 'hero',
    load: "hero.html"  
  });
  app.route({
    view: 'test',
    load: "test.html"  
  });
  app.route({
    view: 'types',
    load: "description.html"  
  });

  // run app
  app.run();

});
