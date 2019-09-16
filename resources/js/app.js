import './jscolor';

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

/**
 * editorjs
 */
import EditorJS from '@editorjs/editorjs';
import ImageTool from '@editorjs/image';

const Header = require('@editorjs/header');
const LinkTool = require('@editorjs/link');
const AttachesTool = require('@editorjs/attaches');

const axios = require('axios');

const codex = document.getElementById('codex-editor');

if (codex) {

    const editor = new EditorJS({
        /**
         * Id of Element that should contain the Editor
         */
        holder: 'codex-editor',
        placeholder: codex.dataset.placeholder,

        /**
         * Available Tools list.
         * Pass Tool's class or Settings object for each Tool you want to use
         */

        //
        tools: {
            header: {
                class: Header,
                inlineToolbar: true
            },

            image: {
                class: ImageTool,
                config: {
                    endpoints: {
                        byFile: '/@editorjs/image', // Your backend file uploader endpoint
                        byUrl: '/@editorjs/image', // Your endpoint that provides uploading by Url
                    }
                }
            },

            linkTool: {
                class: LinkTool,
                config: {
                    endpoint: '/@editorjs/link', // Your backend endpoint for url data fetching
                }
            },

            attaches: {
                class: AttachesTool,
                config: {
                    endpoint: '/@editorjs/attaches'
                }
            }

        },

    });


    $('.reply-ticket-btn').click(function () {
        $('.reply-ticket').toggleClass('active')
    });

    $('.send-reply-ticket').click(function () {

        editor.save().then((outputData) => {

            axios.post('/@editorjs/save/ticket/' + codex.dataset.ticket, {
                data: outputData
            })
                .then(function (response) {
                    $('.reply-ticket').toggleClass('active').promise().done(function () {
                        location.reload();
                    });
                })
                .catch(function (error) {
                    console.log(error);
                });

        }).catch((error) => {
            console.log('Saving failed: ', error)
        });

    })

}


var Chart = require('chart.js');

const home_charts = document.getElementById('home-charts');

if(home_charts){

    var charter = new Chart(home_charts, {
        type: 'bar',
        data: {
            labels: home_charts.dataset.labels.split(','),
            datasets: [{
                label: home_charts.dataset.title,
                data: home_charts.dataset.set.split(','),
                backgroundColor: home_charts.dataset.colors.split(','),
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

}
