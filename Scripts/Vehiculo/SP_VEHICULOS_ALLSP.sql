USE [DBTravelBox]
GO
/****** Object:  StoredProcedure [dbo].[SP_VEHICULO_AGREGAR_VEHICULO]    Script Date: 20/06/2017 21:42:05 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[SP_VEHICULO_AGREGAR_VEHICULO]
	-- Add the parameters for the stored procedure here
	--@codVehiculo int(13),
	@Patente varchar(10),
	@Modelo varchar(50),
	@Marca varchar(50),
	@Capacidad nvarchar(50),
	@TipoVehiculo varchar(5)

AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;
	
	declare @codVehiculo int = 0

	begin try

		if ((@Patente = '' and @Modelo = '') 
						or  @Marca = ''
						or  @Capacidad = ''
						or  @TipoVehiculo = '')
						
		begin
			select 'Complete todos los datos correctamente para continuar.' as Retorno
			return
		end

		if (@Patente != '')
		begin
			if ((select top 1 codVehiculo from Vehiculos where Patente = @Patente) is not null)
			begin
				select 'Ya existe un vehiculo con ese Patente.' as Retorno
				return
			end
		end


		if ((select max(codVehiculo) from Vehiculos) is null)
		begin
			set @codVehiculo = 1;
		end
		else
		begin
			set @codVehiculo = (select max(codvehiculo)+1 from Vehiculos);
		end

		begin transaction
		INSERT INTO [dbo].[Vehiculos]
			   ([codVehiculo],
			   [Patente]
			   ,[Modelo]
			   ,[Marca]
			   ,[Capacidad]
			   ,[TipoVehiculo])
			   
		 VALUES
			   (@codVehiculo
			   ,@Patente
			   ,@Modelo
			   ,@Marca
			   ,@Capacidad
			   ,@TipoVehiculo)
		
		
		commit transaction

		select 'ok' as Retorno

	end try
	begin catch
		
		if (@@TRANCOUNT > 0)
		begin
			rollback tran
		end
		select ERROR_MESSAGE() as Retorno;

	end catch

END

GO
/****** Object:  StoredProcedure [dbo].[SP_VEHICULO_EDITAR]    Script Date: 20/06/2017 21:42:05 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[SP_VEHICULO_EDITAR]
	@codVehiculo int,
	@Patente varchar(10),
	@Modelo varchar(50),
	@Marca varchar(50),
	@Capacidad varchar(50),
	@TipoVehiculo int 
	
AS
BEGIN

	SET NOCOUNT ON;

	begin try

		if( (@Patente = ''	or @Modelo = '')
						or @Marca = ''
						or @Capacidad = ''
						or @TipoVehiculo = '')
						
		begin
			select 'Complete todos los datos correctamente para continuar.' as Retorno
			return
		end


	
		begin transaction

		UPDATE [dbo].[Vehiculos]
   SET [Patente] = @Patente
      ,[Modelo] = @Modelo
      ,[Marca] = @Marca
      ,[Capacidad] = @Capacidad
      ,[TipoVehiculo] = @TipoVehiculo
     

 WHERE codVehiculo = @codVehiculo
		
		
		commit transaction

		select 'ok' as Retorno

	end try
	begin catch
		
		if (@@TRANCOUNT > 0)
		begin
			rollback tran
		end
		select ERROR_MESSAGE() as Retorno;

	end catch
End


GO
/****** Object:  StoredProcedure [dbo].[SP_VEHICULO_ELIMINAR]    Script Date: 20/06/2017 21:42:05 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[SP_VEHICULO_ELIMINAR]
	-- Add the parameters for the stored procedure here
	@codVehiculo int
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	DELETE
FROM Vehiculos where codVehiculo = @codVehiculo
END

GO
/****** Object:  StoredProcedure [dbo].[SP_VEHICULO_GETALL]    Script Date: 20/06/2017 21:42:05 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[SP_VEHICULO_GETALL]
	AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	select * 
	 from Vehiculos

END

GO
/****** Object:  StoredProcedure [dbo].[SP_VEHICULO_GETONE]    Script Date: 20/06/2017 21:42:05 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[SP_VEHICULO_GETONE]
	-- Add the parameters for the stored procedure here
	@codVehiculo int
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SELECT *
FROM Vehiculos where codVehiculo = @codVehiculo
END

GO
