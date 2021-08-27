<?php 
    function getAksi($val)
    {
          $arrAksi = array(
                            null => 'Mengunggu Progress Dokumentasi',
                            'docprogres' => 'Progress Dokumentasi',
                            'docdone' => 'Dokumentasi Selesai',
                            'devprogres' => 'Progress Development',
                            'devdone' => 'Development Selesai',
                            'qcprogres' => 'Progress QC',
                            'qcfailed' => 'QC Tidak Setuju',
                            'qcaccept' => 'QC Setuju',
                            'useraccept' => 'User Setuju',
                            'userreject' => 'User Tidak Setuju',
                          );
        return $arrAksi[$val];
    }
?>