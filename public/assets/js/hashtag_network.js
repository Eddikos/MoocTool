$(document).ready(function() {
    //setup the instance of sigma to handle the visualisation
    var searchTerm = 'flwebsci';
    $('#search-term').html(searchTerm);
    setTimeout(function(){
    var sigInst = sigma.init($('#visualisation')[0]).drawingProperties({
        defaultLabelColor: '#fff',
        defaultLabelSize: 12,
        defaultLabelBGColor: '#fff',
        defaultLabelHoverColor: '#000',
        labelThreshold: 12,
        defaultEdgeType: 'curve'
    }).graphProperties({
        minNodeSize: 1,
        maxNodeSize: 12,
        minEdgeSize: 0.5,
        maxEdgeSize: 0.5,
        sideMargin: 5
    }).mouseProperties({
        maxRatio: 32
    });
    /*
		***THIS IS THE CODE THAT HANDLES THE SOCIAL MEDIA DATA***
		Get the list of hashtag arrays and converts to javascript array
		*/
    $.getJSON('http://waisvm-nh1g12.ecs.soton.ac.uk/assets/data/flwebscihashtags.json', function(data) {
        
	var hashtagsarray = data;
	//for each hashtag array, extract the tag and the list of users who have posted it
        for (var i = 0; i < hashtagsarray.length; i++) {
            var hashtag = hashtagsarray[i]; //the specific hashtag array in the format [tag, [users]]
            var tag = hashtag["hashtag"];
            if (tag.toLowerCase() != searchTerm) {
                var users = hashtag["users"]; //the array of users who have posted with that hashtag
                var userslength = users.length;
                var size = 4;
                if (userslength > 1) {
                    size = size + ((userslength - 1) / 3);
                }
                //create the node details for the graph
                var hashtagNode = {
                    label: '#' + tag,
                    size: size,
                    x: Math.random(),
                    y: Math.random(),
                    attributes: [],
                    color: '#0000FF'
                };
                //add the node to the graph instance
                sigInst.addNode(tag, hashtagNode);
                //Go through the list of users who have posted using this hashtag, and add them to the graph - connected to the hashtag node
                for (var n = 0; n < userslength; n++) {
                    var hashtagUser = users[n];
                    var userid = hashtagUser["user_id"];
                    var username = hashtagUser["user_name"];
                    //check whether the user already exists or not - if not, add them
                    try {
                        var userNode = {
                            label: '@' + username,
                            size: 1,
                            x: Math.random(),
                            y: Math.random(),
                            attributes: [],
                            color: '#FF00FF'
                        };
                        //userNode.attributes.push({attr:'User', val:username});
                        sigInst.addNode(userid, userNode);
                        sigInst.addEdge(i + '' + n, userid, tag);
                    }
                    //or if the user does exist already, join them to this hashtag
                    catch (err) {
                        sigInst.addEdge(i + '' + n, userid, tag);

                    }
                }
            }
        }
    

    /*
     ***END OF DATA PROCESSING STAGE - the rest is sigma code for handling layout and popup information.
     */
    (function() {
        var popUp;

        // This function is used to generate the attributes list from the node attributes.
        // Since the graph comes from GEXF, the attibutes look like:
        // [
        //   { attr: 'Lorem', val: '42' },
        //   { attr: 'Ipsum', val: 'dolores' },
        //   ...
        //   { attr: 'Sit',   val: 'amet' }
        // ]
        function attributesToString(attr) {
            return '' +
                attr.map(function(o) {
                    return '' + o.attr + ': ' + o.val + '<br />';
                }).join('') +
                '';
        }

        function showNodeInfo(event) {
            popUp && popUp.remove();

            var node;
            sigInst.iterNodes(function(n) {
                node = n;
            }, [event.content[0]]);

            popUp = $(
                '<div class="node-info-popup"></div>'
            ).append(
                // The GEXF parser stores all the attributes in an array named
                // 'attributes'. And since sigma.js does not recognize the key
                // 'attributes' (unlike the keys 'label', 'color', 'size' etc),
                // it stores it in the node 'attr' object :
                attributesToString(node['attr']['attributes'])
                //attributesToString( node['attr']['hub'] )
            ).attr(
                'id',
                'node-info' + sigInst.getID()
            ).css({
                'display': 'inline-block',
                'border-radius': 3,
                'padding': 5,
                'background': '#fff',
                'color': '#000',
                'box-shadow': '0 0 0px #666',
                'position': 'absolute',
                'left': node.displayX,
                //'left': 20,
                'top': node.displayY //+15
                    //'top': 600
            });

            $('li', popUp).css('margin', '0 0 0 20px');

            $('#visualisation').append(popUp);
        }

        function hideNodeInfo(event) {
            popUp && popUp.remove();
            popUp = false;
        }

        sigInst.bind('overnodes', showNodeInfo).bind('outnodes', hideNodeInfo).draw();
    })();

    // Start the ForceAtlas2 algorithm
    // (requires "sigma.forceatlas2.js" to be included)
    sigInst.startForceAtlas2();

    var isRunning = true;
    document.getElementById('stop-layout').addEventListener('click', function() {
        if (isRunning) {
            isRunning = false;
            sigInst.stopForceAtlas2();
            document.getElementById('stop-layout').childNodes[0].nodeValue = 'Resume Layout Algorithm';
        } else {
            isRunning = true;
            sigInst.startForceAtlas2();
            document.getElementById('stop-layout').childNodes[0].nodeValue = 'Stop Layout Algorithm';
        }
    }, true);
    document.getElementById('rescale-graph').addEventListener('click', function() {
        sigInst.position(0, 0, 1).draw();
    }, true);

    var greyColor = '#666';
    sigInst.bind('overnodes', function(event) {
        var nodes = event.content;
        var neighbors = {};
        sigInst.iterEdges(function(e) {
            if (nodes.indexOf(e.source) < 0 && nodes.indexOf(e.target) < 0) {
                if (!e.attr['grey']) {
                    e.attr['true_color'] = e.color;
                    e.color = greyColor;
                    e.attr['grey'] = 1;
                }
            } else {
                e.color = e.attr['grey'] ? e.attr['true_color'] : e.color;
                e.attr['grey'] = 0;

                neighbors[e.source] = 1;
                neighbors[e.target] = 1;
            }
        }).iterNodes(function(n) {
            if (!neighbors[n.id]) {
                if (!n.attr['grey']) {
                    n.attr['true_color'] = n.color;
                    n.color = greyColor;
                    n.attr['grey'] = 1;
                }
            } else {
                n.color = n.attr['grey'] ? n.attr['true_color'] : n.color;
                n.attr['grey'] = 0;
            }
        }).draw(2, 2, 2);
    }).bind('outnodes', function() {
        sigInst.iterEdges(function(e) {
            e.color = e.attr['grey'] ? e.attr['true_color'] : e.color;
            e.attr['grey'] = 0;
        }).iterNodes(function(n) {
            n.color = n.attr['grey'] ? n.attr['true_color'] : n.color;
            n.attr['grey'] = 0;
        }).draw(2, 2, 2);
    });
});
}, 500);
});

//if (document.addEventListener) {
//    document.addEventListener('DOMContentLoaded', init, false);
//} else {
//    $(document).ready(init);
//}
