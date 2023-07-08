var ChangeTab = {

    goToHome: function () {
        $("#HeroDiv").css({ "display": "block" });
        $("#TestDiv").css({ "display": "none" });
        $("#TypesDiv").css({ "display": "none" });
        $("#FeaturesDiv").css({ "display": "none" });
        $("#FAQDiv").css({ "display": "none" });
        $("#AboutDiv").css({ "display": "none" });
        $("#AdminUserDiv").css({ "display": "none" });
        $("#AdminTypeDiv").css({ "display": "none" });
        
    },
    
    goToTest: function () {
        $("#TestDiv").css({ "display": "block" });
        $("#HeroDiv").css({ "display": "none" });
        $("#TypesDiv").css({ "display": "none" });
        $("#FeaturesDiv").css({ "display": "none" });
        $("#FAQDiv").css({ "display": "none" });
        $("#AboutDiv").css({ "display": "none" });
        $("#AdminUserDiv").css({ "display": "none" });
        $("#AdminTypeDiv").css({ "display": "none" });
    },

    goToTypes: function () {
        $("#TypesDiv").css({ "display": "block" });
        $("#TestDiv").css({ "display": "none" });
        $("#HeroDiv").css({ "display": "none" });
        $("#FeaturesDiv").css({ "display": "none" });
        $("#FAQDiv").css({ "display": "none" });
        $("#AboutDiv").css({ "display": "none" });
        $("#AdminUserDiv").css({ "display": "none" });
        $("#AdminTypeDiv").css({ "display": "none" });
    },

    goToFeatures: function () {
        $("#FeaturesDiv").css({ "display": "block" });
        $("#TestDiv").css({ "display": "none" });
        $("#TypesDiv").css({ "display": "none" });
        $("#HeroDiv").css({ "display": "none" });
        $("#FAQDiv").css({ "display": "none" });
        $("#AboutDiv").css({ "display": "none" });
        $("#AdminUserDiv").css({ "display": "none" });
        $("#AdminTypeDiv").css({ "display": "none" });
    },

    goToFAQ: function () {
       // ProductService.showProduct(productid);
       $("#FAQDiv").css({ "display": "block" });
       $("#TestDiv").css({ "display": "none" });
       $("#TypesDiv").css({ "display": "none" });
       $("#FeaturesDiv").css({ "display": "none" });
       $("#HeroDiv").css({ "display": "none" });
       $("#AboutDiv").css({ "display": "none" });
       $("#AdminUserDiv").css({ "display": "none" });
       $("#AdminTypeDiv").css({ "display": "none" });
    },

    goToAbout: function () { //goToAbout: function (user_id) {
        $("#AboutDiv").css({ "display": "block" });
        $("#TestDiv").css({ "display": "none" });
        $("#TypesDiv").css({ "display": "none" });
        $("#FeaturesDiv").css({ "display": "none" });
        $("#FAQDiv").css({ "display": "none" });
        $("#HeroDiv").css({ "display": "none" });
        $("#AdminUserDiv").css({ "display": "none" });
        $("#AdminTypeDiv").css({ "display": "none" });
    },

    goToAdminUser: function () { //goToAbout: function (user_id) {
        $("#AdminUserDiv").css({ "display": "block" });
        $("#AdminTypeDiv").css({ "display": "none" });
        $("#AboutDiv").css({ "display": "none" });
        $("#TestDiv").css({ "display": "none" });
        $("#TypesDiv").css({ "display": "none" });
        $("#FeaturesDiv").css({ "display": "none" });
        $("#FAQDiv").css({ "display": "none" });
        $("#HeroDiv").css({ "display": "none" });
    },
    goToAdminTypes: function () { //goToAbout: function (user_id) {
        $("#AdminTypeDiv").css({ "display": "block" });
        $("#AdminUserDiv").css({ "display": "none" });
        $("#AboutDiv").css({ "display": "none" });
        $("#TestDiv").css({ "display": "none" });
        $("#TypesDiv").css({ "display": "none" });
        $("#FeaturesDiv").css({ "display": "none" });
        $("#FAQDiv").css({ "display": "none" });
        $("#HeroDiv").css({ "display": "none" });
    }
  


}
