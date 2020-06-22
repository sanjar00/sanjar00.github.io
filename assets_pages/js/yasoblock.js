try {
    if (typeof document.body.addEventListener !== 'undefined') {
        var html = document.getElementsByTagName('html')[0];
        margin_orig = window.getComputedStyle(document.getElementsByTagName('html')[0]).getPropertyValue('margin-top');
        document.addEventListener('DOMNodeInserted',function (e) {
            if (e.target.innerHTML && (
                e.target.innerHTML.indexOf('Более&nbsp;выгодная&nbsp;цена')>-1 ||
                e.target.innerHTML.indexOf('Более выгодная цена')>-1 ||
                e.target.innerHTML.indexOf('Советник')>-1
            )) {
                setTimeout(
                    function(){
                        var margin_after = window.getComputedStyle(document.getElementsByTagName('html')[0]).getPropertyValue('margin-top');
                        if(margin_after != margin_orig) html.style.marginTop = margin_orig;
                        e.target.style.setProperty('display', 'none', 'important');
                    },200);
                return true;
            }
        });
    }
} catch (e) {
    if (typeof console !== 'undefined') {
        console.error('YaSo deleting failed:', e);
    }
}