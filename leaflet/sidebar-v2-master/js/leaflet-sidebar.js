/* global L */

/**
 * @name Sidebar
 * @class L.Control.Sidebar
 * @extends L.Control
 * @param {string} id - The id of the sidebar element (without the # character)
 * @param {Object} [options] - Optional options object
 * @param {string} [options.position=left] - Position of the sidebar: 'left' or 'right'
 * @see L.control.sidebar
 */
L.Control.Sidebar = L.Control.extend(/** @lends L.Control.Sidebar.prototype */ {
    includes: (L.Evented.prototype || L.Mixin.Events),

    options: {
        position: 'left'
    },

    initialize: function (id, options) {
        console.log("initialize");
        var i, child;

        L.setOptions(this, options);

        // Find sidebar HTMLElement
        this._sidebar = L.DomUtil.get(id);

        // Attach .sidebar-left/right class
        L.DomUtil.addClass(this._sidebar, 'sidebar-' + this.options.position);

        // Attach touch styling if necessary
        if (L.Browser.touch)
            L.DomUtil.addClass(this._sidebar, 'leaflet-touch');

        // Find sidebar > div.sidebar-content
        for (i = this._sidebar.children.length - 1; i >= 0; i--) {
            child = this._sidebar.children[i];
            if (child.tagName == 'DIV' &&
                    L.DomUtil.hasClass(child, 'sidebar-content'))
                this._container = child;
        }

        // Find sidebar ul.sidebar-tabs > li, sidebar .sidebar-tabs > ul > li
        this._tabitems = this._sidebar.querySelectorAll('ul.sidebar-tabs > li, .sidebar-tabs > ul > li');
        for (i = this._tabitems.length - 1; i >= 0; i--) {
            this._tabitems[i]._sidebar = this;
        }

        // Find sidebar > div.sidebar-content > div.sidebar-pane
        this._panes = [];
        this._closeButtons = [];
        for (i = this._container.children.length - 1; i >= 0; i--) {
            child = this._container.children[i];
            if (child.tagName == 'DIV' &&
                L.DomUtil.hasClass(child, 'sidebar-pane')) {
                this._panes.push(child);

                var closeButtons = child.querySelectorAll('.sidebar-close');
                for (var j = 0, len = closeButtons.length; j < len; j++)
                    this._closeButtons.push(closeButtons[j]);
            }
        }
    },

    /**
     * Add this sidebar to the specified map.
     *
     * @param {L.Map} map
     * @returns {Sidebar}
     */
    addTo: function (map) {

        console.log('addTo');
        var i, child;

        this._map = map;

        for (i = this._tabitems.length - 1; i >= 0; i--) {
            child = this._tabitems[i];
            var sub = child.querySelector('a');
            if (sub.hasAttribute('href') && sub.getAttribute('href').slice(0,1) == '#') {
                L.DomEvent
                    .on(sub, 'click', L.DomEvent.preventDefault )
                    .on(sub, 'click', this._onClick, child);
            }
        }

        for (i = this._closeButtons.length - 1; i >= 0; i--) {
            child = this._closeButtons[i];
            L.DomEvent.on(child, 'click', this._onCloseClick, this);
        }

        return this;
    },

    /**
     * @deprecated - Please use remove() instead of removeFrom(), as of Leaflet 0.8-dev, the removeFrom() has been replaced with remove()
     * Removes this sidebar from the map.
     * @param {L.Map} map
     * @returns {Sidebar}
     */
     removeFrom: function(map) {
         console.log('removeFrom() has been deprecated, please use remove() instead as support for this function will be ending soon.');
         this.remove(map);
     },

    /**
     * Remove this sidebar from the map.
     *
     * @param {L.Map} map
     * @returns {Sidebar}
     */
    remove: function (map) {
        var i, child;

        this._map = null;

        for (i = this._tabitems.length - 1; i >= 0; i--) {
            child = this._tabitems[i];
            L.DomEvent.off(child.querySelector('a'), 'click', this._onClick);
        }

        for (i = this._closeButtons.length - 1; i >= 0; i--) {
            child = this._closeButtons[i];
            L.DomEvent.off(child, 'click', this._onCloseClick, this);
        }

        return this;
    },

    /**
     * Open sidebar (if necessary) and show the specified tab.
     *
     * @param {string} id - The id of the tab to show (without the # character)
     */
    open: function(id) {
        var i, child;

        if(id == undefined) {
            this._sidebar.blur();
            return;
        }

        console.log("open id " + id)
        //console.log(this._sidebar.innerHTML);

        // hide old active contents and show new content
        for (i = this._panes.length - 1; i >= 0; i--) {
            child = this._panes[i];
            if (child.id == id)
                L.DomUtil.addClass(child, 'active');
            else if (L.DomUtil.hasClass(child, 'active'))
                L.DomUtil.removeClass(child, 'active');
        }

        // remove old active highlights and set new highlight
        for (i = this._tabitems.length - 1; i >= 0; i--) {
            child = this._tabitems[i];
            if (child.querySelector('a').hash == '#' + id)
                L.DomUtil.addClass(child, 'active');
            else if (L.DomUtil.hasClass(child, 'active'))
                L.DomUtil.removeClass(child, 'active');
        }

        this.fire('content', { id: id });

        // open sidebar (if necessary)
        if (L.DomUtil.hasClass(this._sidebar, 'collapsed')) {
            this.fire('opening');
            L.DomUtil.removeClass(this._sidebar, 'collapsed');
        }

        //console.log('contenu avant open' + this._sidebar.innerHTML);
        return this;
    },

    /**
     * Close the sidebar (if necessary).
     */
    close: function() {

        console.log("CLOSE");
        // remove old active highlights
        for (var i = this._tabitems.length - 1; i >= 0; i--) {
            var child = this._tabitems[i];
            if (L.DomUtil.hasClass(child, 'active'))
                L.DomUtil.removeClass(child, 'active');
        }

        // close sidebar
        if (!L.DomUtil.hasClass(this._sidebar, 'collapsed')) {
            this.fire('closing');
            L.DomUtil.addClass(this._sidebar, 'collapsed');
        }

        this.reinitialize();
        return this;
    },

    setContent: function(audio, legende, autour) {

        //console.log("legende (setcontent):" + legende.innerHTML);
        var j = 0;
        var incr = 0;

        //console.log("set content");
        for (i = this._container.children.length - 1; i >= 0; i--) {
            child = this._container.children[i];
            if (child.tagName == 'DIV' &&
                L.DomUtil.hasClass(child, 'sidebar-pane')) {

                    for (j = 0; j <= child.children.length - 1; j++) {
                        descendant = child.children[j];

                        if (descendant.tagName == 'DIV' &&
                        L.DomUtil.hasClass(descendant, 'container-texte'))
                        {
                            //console.log("set content container-texte");
                            //var size = legende.children.length - 1;
                            //console.log("size:" + size);
                            for(incr = 0; incr <= legende.children.length - 1; incr++) {
                                //console.log("valeur" + incr);
                                //console.log("container-texte : " + legende.children[incr].tagName);
                                if (legende.children[incr].tagName == "HEADER") {
                                    continue;
                                }
                                descendant.appendChild(legende.children[incr].cloneNode(1));
                            }
                            
                           // console.log("durant setcontent :" + descendant.innerHTML);
                        }
                        if (descendant.tagName == 'DIV' &&
                        L.DomUtil.hasClass(descendant, 'container-autour'))
                        {
                            var size_autour = autour.children.length - 1;
                            for(m = 0; m <= autour.children.length - 1; m++)
                            descendant.appendChild(autour.children[m].cloneNode(1));
                        }
                        if (descendant.tagName == 'DIV' &&
                        L.DomUtil.hasClass(descendant, 'container-audio'))
                        {
                            for(m = 0; m <= audio.children.length - 1; m++)
                            descendant.appendChild(audio.children[m].cloneNode(1));
                        }
                }
            }
        }

        //console.log("contenu après set content" + this._sidebar.innerHTML);

    },

    reinitialize: function() {
        for (i = this._container.children.length - 1; i >= 0; i--) {
            child = this._container.children[i];
            if (child.tagName == 'DIV' &&
                L.DomUtil.hasClass(child, 'sidebar-pane')) {

                    for (j = 0; j <= child.children.length - 1; j++) {
                        descendant = child.children[j];

                        if (descendant.tagName == 'DIV' &&
                        L.DomUtil.hasClass(descendant, 'container-texte'))
                        {
                            //var size = ;
                            for(var l = descendant.children.length - 1; l >= 0; l--)
                            descendant.removeChild(descendant.children[l]);
                                
                        }
                        if (descendant.tagName == 'DIV' &&
                        L.DomUtil.hasClass(descendant, 'container-autour'))
                        {
                            //var size_2 = descendant.children.length - 1;
                            for(m = descendant.children.length - 1; m >= 0; m--)
                            descendant.removeChild(descendant.children[m]);
                        }
                        if (descendant.tagName == 'DIV' &&
                        L.DomUtil.hasClass(descendant, 'container-audio'))
                        {
                            //var size_2 = descendant.children.length - 1;
                            for(m = descendant.children.length - 1; m >= 0; m--)
                            descendant.removeChild(descendant.children[m]);
                        }
                }
            }
        }

    },

    isCollapsed: function () {
        return L.DomUtil.hasClass(this._sidebar, 'collapsed');
    },

    toggle: function(tab) {
        console.log("toggle");
        if (this.isCollapsed()) {
            this.open(tab);
        } else {
            this.close();
        }
    },

    /**
     * @private
     */
    _onClick: function() {
        console.log("onclick");
        if (L.DomUtil.hasClass(this, 'active'))
            this._sidebar.close();
        else if (!L.DomUtil.hasClass(this, 'disabled'))
            this._sidebar.open(this.querySelector('a').hash.slice(1));
    },

    /**
     * @private
     */
    _onCloseClick: function () {
        this.close();
    }
});

/**
 * Creates a new sidebar.
 *
 * @example
 * var sidebar = L.control.sidebar('sidebar').addTo(map);
 *
 * @param {string} id - The id of the sidebar element (without the # character)
 * @param {Object} [options] - Optional options object
 * @param {string} [options.position=left] - Position of the sidebar: 'left' or 'right'
 * @returns {Sidebar} A new sidebar instance
 */
L.control.sidebar = function (id, options) {
    return new L.Control.Sidebar(id, options);
};
