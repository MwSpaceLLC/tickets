import {TweenMax, Power2, TimelineLite} from "gsap/TweenMax";
import swal from 'sweetalert';

/** @jscolor */
import './jscolor';

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

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

    // const editor = new EditorJS({
    //     /**
    //      * Id of Element that should contain the Editor
    //      */
    //     holder: 'codex-editor',
    //     placeholder: codex.dataset.placeholder,
    //
    //     /**
    //      * Available Tools list.
    //      * Pass Tool's class or Settings object for each Tool you want to use
    //      */
    //
    //     //
    //     tools: {
    //         header: {
    //             class: Header,
    //             inlineToolbar: true
    //         },
    //
    //         image: {
    //             class: ImageTool,
    //             config: {
    //                 endpoints: {
    //                     byFile: '/@editorjs/image', // Your backend file uploader endpoint
    //                     byUrl: '/@editorjs/image', // Your endpoint that provides uploading by Url
    //                 }
    //             }
    //         },
    //
    //         // linkTool: {
    //         //     class: LinkTool,
    //         //     config: {
    //         //         endpoint: '/@editorjs/link', // Your backend endpoint for url data fetching
    //         //     }
    //         // },
    //
    //         attaches: {
    //             class: AttachesTool,
    //             config: {
    //                 endpoint: '/@editorjs/attaches'
    //             }
    //         }
    //
    //     },
    //
    // });


    $('.reply-ticket-open').click(function () {
        TweenLite.to('.reply-ticket', .3, {bottom: '0px'});
    });

    $('.reply-ticket-close').click(function () {
        TweenLite.to('.reply-ticket', .3, {bottom: '-720px'});
    });

    function inreply() {
        TweenLite.to('.container', .1, {opacity: 0.5});

        TweenLite.to('.reply-ticket', 0.3, {
            bottom: '-560px',
        })

        $('.reply-ticket-close').hide();
        $('.send-reply-ticket').addClass('loading');
        $('.send-reply-ticket>i')
            .replaceWith('<i class="material-icons spin"> refresh </i>');
    }

    function inreplyout() {
        TweenLite.to('.container', .1, {opacity: 1});

        TweenLite.to('.reply-ticket', 0.3, {
            bottom: '0px',
        })

        $('.reply-ticket-close').show();
        $('.send-reply-ticket').removeClass('loading');
        $('.send-reply-ticket>i')
            .replaceWith('<i class="material-icons"> create </i>');
    }

    $('.send-reply-ticket').click(function () {

        editor.save().then((outputData) => {

            inreply();

            axios.post('/@editorjs/save/ticket/' + codex.dataset.ticket, {
                data: outputData
            })
                .then(response => {
                    TweenLite.to('body', .1, {opacity: 0.5});

                    TweenLite.to('.reply-ticket', 0.3, {
                        bottom: '-720px',
                        onComplete: () => {
                            location.reload();
                        }
                    })
                })
                .catch((error) => {
                    swal(error.response.statusText, error.response.data.message, "error");
                    console.log('Saving failed: ', error.response)
                    inreplyout();
                });

        }).catch((error) => {
            swal(error.response.statusText, error.response.data.message, "error");
            console.log('Saving failed: ', error.response)
            console.log('Saving failed: ', error.response)
            inreplyout();
        });

    })

}

var Chart = require('chart.js');

const home_charts = document.getElementById('home-charts');

if (home_charts) {

    var charter = new Chart(home_charts, {
        type: 'pie',
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

//Custom fade In
document.addEventListener('DOMContentLoaded', () => {
    TweenLite.to('body', .3, {opacity: 1})
});

//prevent change page fade
document.querySelectorAll('a').forEach(element => {
    if (element.href) {
        element.addEventListener('click', e => {
            if (element.getAttribute('target') && element.getAttribute('target') === '_blank') {
                window.open(element.href, "element.href", "width=" + screen.availWidth + ",height=" + screen.availHeight)
            } else {
                e.preventDefault();
                TweenLite.to('body', .3, {
                    opacity: 0, onComplete: () => {
                        location.href = element.href
                    }
                })
            }
        })
    }
});

//prevent submit with animate
document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();

        var submit = $(form).find(':submit');
        var icon = $(form).find(':submit>i');

        if (icon) {
            submit.addClass('loading');
            icon.replaceWith('<i class="material-icons spin"> refresh </i>')
                .promise(form.submit());
        } else {
            submit.addClass('loading');
            submit.append('<i class="material-icons spin"> refresh </i>')
                .promise(form.submit());
        }

    });
});


// TODO: MUST REFACTORING => CLEAR CODE -_-'
// new reply tiny

const tinymce = require('tinymce');
var tinyeditor = document.getElementById('tiny-editor');

if (tinyeditor) {

    $('.tiny-open').click(function () {
        TweenLite.to('.reply-ticket', .3, {bottom: '0px'});
    });

    $('.tiny-close').click(function () {
        TweenLite.to('.reply-ticket', .3, {bottom: '-1220px'});
    });

    tinymce.init({
        selector: "#tiny-editor",
        height: (document.querySelector('.reply-ticket').scrollHeight - 80),
        plugins: "paste",
        paste_data_images: true
    });

    document.querySelector('.tiny-reply').addEventListener('click', tinyReply);

    function tinyReply() {

        var ticket = document.getElementById('ticket');

        axios.post('/@tiny/save/ticket/' + ticket.dataset.tid, {
            data: {
                blocks: [{
                    type: 'tiny',
                    data: tinymce.activeEditor.getContent() || ''
                }]
            }
        })
            .then(response => {

                console.log(response)

                TweenLite.to('body', .1, {opacity: 0.5});

                TweenLite.to('.reply-ticket', 0.3, {
                    bottom: '-1220px',
                    onComplete: () => {
                        location.reload();
                    }
                })
            })
            .catch((error) => {

                swal(error.response.statusText, error.response.data.message, "error");

                TweenLite.to('body', .1, {opacity: 0.5});

                TweenLite.to('.reply-ticket', 0.3, {
                    bottom: '-1220px',
                    onComplete: () => {
                        location.reload();
                    }
                })
            });
    }

}
