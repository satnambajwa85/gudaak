<?php
$connection = mysql_connect("localhost",
                            "root",
                            "");
mysql_select_db("test", $connection);
$result = mysql_query("SELECT * FROM blocks"); 
?>

CKEDITOR.dialog.add('span', function (a) {
    var b = CKEDITOR.plugins.span,
        c = function () {
            var E = this.getDialog(),
                F = E.getContentElement('target', 'popupFeatures'),
                G = E.getContentElement('target', 'linkTargetName'),
                H = this.getValue();
            if (!F || !G) return;
            F = F.getElement();
            F.hide();
            G.setValue('');
			
           
        },
        d = function () { 
            /*var E = this.getDialog(),
                F = ['urlOptions', 'anchorOptions', 'emailOptions'],
                G = this.getValue(),
                H = E.definition.getContents('upload'),
                I = H && H.hidden;
            if (G == 'url') {
                if (a.config.linkShowTargetTab) E.showPage('target');
                if (!I) E.showPage('upload');
            } else {
                E.hidePage('target');
                if (!I) E.hidePage('upload');
            }
            for (var J = 0; J < F.length; J++) {
                var K = E.getContentElement('info', F[J]);
                if (!K) continue;
                K = K.getElement().getParent().getParent();
                if (F[J] == G + 'Options') K.show();
                else K.hide();
            }
            E.layout();*/
        },
      
        p = function (E, F) {
            /*var G = F && (F.data('cke-saved-href') || F.getAttribute('href')) || '',
                H, I, J, K, L = {};
            if (H = G.match(e)) if (y == 'encode') G = G.replace(l, function (ab, ac, ad) {
                return 'mailto:' + String.fromCharCode.apply(String, ac.split(',')) + (ad && w(ad));
            });
            else if (y) G.replace(m, function (ab, ac, ad) {*/
               /* if (ac == z.name) {
                    L.type = 'email';
                    var ae = L.email = {},
                        af = /[^,\s]+/g,
                        ag = /(^')|('$)/g,
                        ah = ad.match(af),
                        ai = ah.length,
                        aj, ak;
                    for (var al = 0; al < ai; al++) {
                        ak = decodeURIComponent(w(ah[al].replace(ag, '')));
                        aj = z.params[al].toLowerCase();
                        ae[aj] = ak;
                    }
                    ae.address = [ae.name, ae.domain].join('@');
                }*/
            //});
           /* if (!L.type) if (J = G.match(i)) {
                L.type = 'anchor';
                L.anchor = {};
                L.anchor.name = L.anchor.id = J[1];
            } else if (I = G.match(f)) {
                var M = G.match(g),
                    N = G.match(h);
                L.type = 'email';
                var O = L.email = {};
                O.address = I[1];
                M && (O.subject = decodeURIComponent(M[1]));
                N && (O.body = decodeURIComponent(N[1]));
            } else if (G && (K = G.match(j))) {
                L.type = 'url';
                L.url = {};
                L.url.protocol = K[1];
                L.url.url = K[2];
            } else L.type = 'url';*/

            if (F) {
				
              /*  var P = F.getAttribute('target');
                L.target = {};
                L.adv = {};
                if (!P) {
                    var Q = F.data('cke-pa-onclick') || F.getAttribute('onclick'),
                        R = Q && Q.match(n);
                    if (R) {
                        L.target.type = 'popup';
                        L.target.name = R[1];
                        var S;
                        while (S = o.exec(R[2])) {
                            if (S[2] == 'yes' || S[2] == '1') L.target[S[1]] = true;
                            else if (isFinite(S[2])) L.target[S[1]] = S[2];
                        }
                    }
                } else {
                    var T = P.match(k);
                    if (T) L.target.type = L.target.name = P;
                    else {
                        L.target.type = 'frame';
                        L.target.name = P;
                    }
                }
                var U = this,
                V = function (ab, ac) {
                        var ad = F.getAttribute(ac);
                        if (ad !== null) L.adv[ab] = ad || '';
                    };
                V('advId', 'id');
                V('advLangDir', 'dir');
                V('advAccessKey', 'accessKey');
                L.adv.advName = F.data('cke-saved-name') || F.getAttribute('name') || '';
                V('advLangCode', 'lang');
                V('advTabIndex', 'tabindex');
                V('advTitle', 'title');
                V('advContentType', 'type');
                V('advCSSClasses', 'class');
                V('advCharset', 'charset');
                V('advStyles', 'style'); */
            }
            /*var W = E.document.getElementsByTag('img'),
                X = new CKEDITOR.dom.nodeList(E.document.$.anchors),
                Y = L.anchors = [];
            for (var Z = 0; Z < W.count(); Z++) {
                var aa = W.getItem(Z);
                if (aa.data('cke-realelement') && aa.data('cke-real-element-type') == 'anchor') Y.push(E.restoreRealElement(aa));
            }
            for (Z = 0; Z < X.count(); Z++) Y.push(X.getItem(Z));
            for (Z = 0; Z < Y.length; Z++) {
                aa = Y[Z];
                Y[Z] = {
                    name: aa.getAttribute('name'),
                    id: aa.getAttribute('id')
                };
            }
            this._.selectedElement = F;
            return L;*/
        },
        q = function (E, F) {
            //if (F[E]) this.setValue(F[E][this.id] || '');
        },
        r = function (E) {
           // return q.call(this, 'target', E);
        },
        s = function (E) {
           // return q.call(this, 'adv', E);
        },
        t = function (E, F) {
            if (!F[E]) F[E] = {};
            F[E][this.id] = this.getValue() || '';
        },
        u = function (E) {
            //return t.call(this, 'target', E);
        },
        v = function (E) {
            return t.call(this, 'adv', E);
        };

    function w(E) {
        return E.replace(/\\'/g, "'");
    };

    function x(E) {
        return E.replace(/'/g, '\\$&');
    };
   // var y = a.config.emailProtection || '';
    /*if (y && y != 'encode') {
        var z = {};
        y.replace(/^([^(]+)\(([^)]+)\)$/, function (E, F, G) {
            z.name = F;
            z.params = [];
            G.replace(/[^,\s]+/g, function (H) {
                z.params.push(H);
            });
        });
    }*/
    function A(E) {
       /* var F, G = z.name,
            H = z.params,
            I, J;
        F = [G, '('];
        for (var K = 0; K < H.length; K++) {
            I = H[K].toLowerCase();
            J = E[I];
            K > 0 && F.push(',');
            F.push("'", J ? x(encodeURIComponent(E[I])) : '', "'");
        }
        F.push(')');
        return F.join(''); */
    };

    function B(E) {
        /*var F, G = E.length,
            H = [];
        for (var I = 0; I < G; I++) {
            F = E.charCodeAt(I);
            H.push(F);
        }
        return 'String.fromCharCode(' + H.join(',') + ')'; */
    };
	
    var C = a.lang.common,

        D = a.lang.link;
		
	
    return {
        title: "Span",
        minWidth: 350,
        minHeight: 230,
        contents: [ {
            id: 'advanced',
           label: D.advanced,
           title: D.advanced,
            elements: [{
                type: 'vbox',
                padding: 1,
                children: [{
                    type: 'hbox',
                    widths: ['45%', '35%', '20%'],
                    children: [{
                        type: 'text',
                        id: 'advId',
                        label: D.id,
                        setup: s,
                        commit: v
                    }, {
                        type: 'select',
                        id: 'advLangDir',
                        label: D.langDir,
                        'default': '',
                        style: 'width:110px',
                        items: [
                    <?php $i = 1;
				   while($row = mysql_fetch_assoc($result))
					  {
						 if($i == 1) {
							echo "['$row[block_id]','$row[unique_id]']";
							$i = null;
						 }
						 else
							echo ",['$row[block_id]','$row[unique_id]']";
					  }
				?>['one','1']
                        ],
                        setup: s,
                        commit: v
                    }, {
                        type: 'text',
                        id: 'advAccessKey',
                        width: '80px',
                        label: D.acccessKey,
                        maxLength: 1,
                        setup: s,
                        commit: v
                    }]
                }, {
                    type: 'hbox',
                    widths: ['45%', '35%', '20%'],
                    children: [{
                        type: 'text',
                        label: D.name,
                        id: 'advName',
                        setup: s,
                        commit: v
                    }, {
                        type: 'text',
                        label: D.langCode,
                        id: 'advLangCode',
                        width: '110px',
                        'default': '',
                        setup: s,
                        commit: v
                    }, {
                        type: 'text',
                        label: D.tabIndex,
                        id: 'advTabIndex',
                        width: '80px',
                        maxLength: 5,
                        setup: s,
                        commit: v
                    }]
                }]
            }, {
                type: 'vbox',
                padding: 1,
                children: [{
                    type: 'hbox',
                    widths: ['45%', '55%'],
                    children: [{
                        type: 'text',
                        label: D.advisoryTitle,
                        'default': '',
                        id: 'advTitle',
                        setup: s,
                        commit: v
                    }, {
                        type: 'text',
                        label: D.advisoryContentType,
                        'default': '',
                        id: 'advContentType',
                        setup: s,
                        commit: v
                    }]
                }, {
                    type: 'hbox',
                    widths: ['45%', '55%'],
                    children: [{
                        type: 'text',
                        label: D.cssClasses,
                        'default': '',
                        id: 'advCSSClasses',
                        setup: s,
                        commit: v
                    }, {
                        type: 'text',
                        label: D.charset,
                        'default': '',
                        id: 'advCharset',
                        setup: s,
                        commit: v
                    }]
                }, {
                    type: 'hbox',
                    children: [{
                        type: 'text',
                        label: D.styles,
                        'default': '',
                        id: 'advStyles',
                        setup: s,
                        commit: v
                    }]
                }]
            }]
        }],
        onShow: function () {
           var H = this;
            H.fakeObj = false;
            var E = H.getParentEditor(),
                F = E.getSelection(),
                G = null;
           // if ((G = b.getSelectedLink(E)) && G.hasAttribute('href')) F.selectElement(G);
            /*else*/ if ((G = F.getSelectedElement()) && G.is('img') && G.data('cke-real-element-type') && G.data('cke-real-element-type') == 'anchor') {
                H.fakeObj = G;
                G = E.restoreRealElement(H.fakeObj);
                F.selectElement(H.fakeObj);
            } else G = null;
            H.setupContent(p.apply(H, [E, G]));
        },
        onOk: function () {
            var E = {},
                F = [],
                G = {},
                H = this,
                I = this.getParentEditor();
            this.commitContent(G);
            if (G.target) if (G.target.type == 'popup') {
              
            } else {
                if (G.target.type != 'notSet' && G.target.name) E.target = G.target.name;
                else F.push('target');
                F.push('data-cke-pa-onclick', 'onclick');
            }
			
            if (G.adv) { 
                var Z = function (ai, aj) {
                    var ak = G.adv[ai];
					
                    if (ak) { E[aj] = ak;
					}
                    else { 
						F.push(aj);
					}
					
                };
                Z('advId', 'id');
                Z('advLangDir', 'dir');
                Z('advAccessKey', 'accessKey');
				if(G.adv.advId)
				{
					E.id="test_"+G.adv.advId+"_"+G.adv.advLangDir;
				}
                if (G.adv.advName) {
                    E.name = E['data-cke-saved-name'] = G.adv.advName;
                    E['class'] = (E['class'] ? E['class'] + ' ' : '') + 'cke_anchor';
                } else F = F.concat(['data-cke-saved-name', 'name']);
                Z('advLangCode', 'lang');
                Z('advTabIndex', 'tabindex');
                Z('advTitle', 'title');
                Z('advContentType', 'type');
                Z('advCSSClasses', 'class');
                Z('advCharset', 'charset');
                Z('advStyles', 'style');
            }
			
          
            if (!this._.selectedElement) {
                var aa = I.getSelection(),
                    ab = aa.getRanges(true);
                  var ad = new CKEDITOR.style({
                    element: 'span',
                    attributes: E
                });
                ad.type = CKEDITOR.STYLE_INLINE;
                ad.apply(I.document);
            } else {
                var ae = this._.selectedElement,
                    af = ae.data('cke-saved-href'),
                    ag = ae.getHtml();
                if (CKEDITOR.env.ie && E.name != ae.getAttribute('name')) {
                    var ah = new CKEDITOR.dom.element('<a name="' + CKEDITOR.tools.htmlEncode(E.name) + '">', I.document);
                    aa = I.getSelection();
                    ae.copyAttributes(ah, {
                        name: 1
                    });
                    ae.moveChildren(ah);
                    ah.replace(ae);
                    ae = ah;
                    aa.selectElement(ae);
                }
                ae.setAttributes(E);
                ae.removeAttributes(F);
                if (af == ag || G.type == 'email' && ag.indexOf('@') != -1) ae.setHtml(G.type == 'email' ? G.email.address : E['data-cke-saved-href']);
                if (ae.getAttribute('name')) ae.addClass('cke_anchor');
                else ae.removeClass('cke_anchor');
                if (this.fakeObj) I.createFakeElement(ae, 'cke_anchor', 'anchor').replace(this.fakeObj);
                delete this._.selectedElement;
            }
        },
        onLoad: function () { 
           /* if (!a.config.linkShowAdvancedTab) this.hidePage('advanced');
            if (!a.config.linkShowTargetTab) this.hidePage('target'); */
        },
        onFocus: function () { 
            /*var E = this.getContentElement('info', 'linkType'),
                F;
            if (E && E.getValue() == 'url') {
                F = this.getContentElement('info', 'url');
                F.select();
            }*/
        }
    };
});