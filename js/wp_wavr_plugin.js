function add_wave(containerId,options){
    var wavePanel = new WavePanel(options.server);
    wavePanel.loadWave(options.id);
    wavePanel.setUIConfig(options.bgcolor, options.color,options.font,options.font_size+"pt");
    wavePanel.init(document.getElementById(containerId));
}