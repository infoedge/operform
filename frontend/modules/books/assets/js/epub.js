$(function(){
    var exControls = TreineticEpubReader.handler();
    exControls.registerEvent("onEpubLoadSuccess", function () {

    });

    exControls.registerEvent("onEpubLoadFail", function () {

    });

    exControls.registerEvent("onTOCLoaded", function (hasTOC) {
        if (!hasTOC) {
           let toc =  exControls.getTOCJson();
        }
        // you can use following api calls after this
        /**
        exControls.hasNextPage()
        exControls.nextPage();
        exControls.hasPrevPage()
        exControls.prevPage();
        exControls.makeBookMark();
        exControls.changeFontSize(int);
        exControls.changeColumnMaxWidth(int);
        exControls.setTheme("theme-id-goes-here");
        exControls.setScrollMode("scroll-type-id-goes-here");
        exControls.setDisplayFormat("display-format-id-goes-here");

        extcontrols.getRecommendedFontSizeRange()
        extcontrols.getRecommendedColumnWidthRange()
        var list = extcontrols.getAvailableThemes();
        var list = extcontrols.getAvailableScrollModes();
        var list = extcontrols.getAvailableDisplayFormats();
        var settings = extcontrols.getCurrentReaderSettings();
        **/
    });

    var config = TreineticEpubReader.config();
    config.jsLibRoot = "src/ZIPJS/";

    TreineticEpubReader.create("#epub-reader-frame");
    //TreineticEpubReader.open("assets/epub/epub_1.epub");
    TreineticEpubReader.open("assets/ebooks/interactive_epub.epub");
});