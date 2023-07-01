var ChangeTab = {

    goToHome: function () {
        $("#HeroDiv").css({ "display": "block" });
        $("#TestDiv").css({ "display": "none" });
        $("#TypesDiv").css({ "display": "none" });
        $("#FeaturesDiv").css({ "display": "none" });
        $("#FAQDiv").css({ "display": "none" });
        $("#AboutDiv").css({ "display": "none" });
        
    },
    
    goToTest: function () {
        $("#TestDiv").css({ "display": "block" });
        $("#HeroDiv").css({ "display": "none" });
        $("#TypesDiv").css({ "display": "none" });
        $("#FeaturesDiv").css({ "display": "none" });
        $("#FAQDiv").css({ "display": "none" });
        $("#AboutDiv").css({ "display": "none" });
    },

    goToTypes: function () {
        $("#TypesDiv").css({ "display": "block" });
        $("#TestDiv").css({ "display": "none" });
        $("#HeroDiv").css({ "display": "none" });
        $("#FeaturesDiv").css({ "display": "none" });
        $("#FAQDiv").css({ "display": "none" });
        $("#AboutDiv").css({ "display": "none" });
    },

    goToFeatures: function () {
        $("#FeaturesDiv").css({ "display": "block" });
        $("#TestDiv").css({ "display": "none" });
        $("#TypesDiv").css({ "display": "none" });
        $("#HeroDiv").css({ "display": "none" });
        $("#FAQDiv").css({ "display": "none" });
        $("#AboutDiv").css({ "display": "none" });
    },

    goToFAQ: function () {
       // ProductService.showProduct(productid);
       $("#FAQDiv").css({ "display": "block" });
       $("#TestDiv").css({ "display": "none" });
       $("#TypesDiv").css({ "display": "none" });
       $("#FeaturesDiv").css({ "display": "none" });
       $("#HeroDiv").css({ "display": "none" });
       $("#AboutDiv").css({ "display": "none" });
    },

    goToAbout: function () { //goToAbout: function (user_id) {
        $("#AboutDiv").css({ "display": "block" });
        $("#TestDiv").css({ "display": "none" });
        $("#TypesDiv").css({ "display": "none" });
        $("#FeaturesDiv").css({ "display": "none" });
        $("#FAQDiv").css({ "display": "none" });
        $("#HeroDiv").css({ "display": "none" });
    },

  


}
