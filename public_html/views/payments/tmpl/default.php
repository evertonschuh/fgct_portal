<?php
defined('_JEXEC') or die('Restricted access');

JHTML::_('behavior.formvalidation');

$listOrder    = $this->state->get('list.ordering');
$listDirn    = $this->state->get('list.direction');

$saveOrder    = $listOrder == 'ordering';
?>

<form method="post" name="adminForm">



    <div class="card">
        <div class="card-datatable table-responsive">
            <div class="dataTables_wrapper dt-bootstrap5 no-footer ">
                <div class="row mx-2 py-3">
                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-3 mb-3">
                        <div class="me-2">
                            <div class="dataTables_length" id="DataTables_Table_0_length">
                                <label>
                                    <?php echo $this->pagination->getLimitBox(); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                            <div class="dataTables_filter">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" id="search" class="form-control small" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" placeholder="<?php echo JText::_('JGLOBAL_FILTER_SEARCH_TITLE') ?>">
                                    <button class="btn btn-outline-primary" type="submit"><i class="bx bx-search-alt-2" ></i></button>
                                    <button class="btn btn-outline-primary" type="button" onclick="document.getElementById('search').value='';this.form.submit();" title="Limpar"><i class="bx bxs-eraser"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="datatables-users table border-top dataTable no-footer dtr-column">
                    <thead>
                        <tr> 
                            
                            <th class="sorting sorting_desc d-none d-md-table-cell"><?php echo JHtml::_('grid.sort',  'Número', 'id_pagamento', $listDirn, $listOrder); ?></th>
                            <th class="sorting sorting_desc"><?php echo JHtml::_('grid.sort', 'Produto', 'produto', $listDirn, $listOrder); ?></th>
                            <th class="sorting text-center d-none d-md-table-cell"><?php echo JHtml::_('grid.sort', 'Vencimento', 'vencimento_pagamento', $listDirn, $listOrder); ?></th>
                            <th class="sorting text-center d-none d-md-table-cell"><?php echo JHtml::_('grid.sort', 'Valor', 'valor_pagamento', $listDirn, $listOrder); ?></th>
                            <th class="sorting text-center">Status</th>
                            <th class="sorting text-center d-none d-md-table-cell"><?php echo JHtml::_('grid.sort', 'Pagamento', 'baixa_pagamento', $listDirn, $listOrder); ?></th>
                            <th class="sorting text-center d-none d-md-table-cell"><?php echo JHtml::_('grid.sort', 'Método', 'name_pagamento_metodo', $listDirn, $listOrder); ?></th>
                            <th class="sorting_disabled text-center" width="2%" >Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $this->loadTemplate('items'); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7" align="right">
                                <strong>Total de Itens <?php echo $this->total; ?></strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <div class="row mx-2">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_info mt-4">
                            <?php echo $this->pagination->getPagesCounter(); ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_paginate paging_simple_numbers">
                            <div class="pagination-div float-end">
                                <?php echo $this->pagination->getPagesLinks(); ?>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="controller" value="payments" />
    <input type="hidden" name="view" value="payments" />
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>
